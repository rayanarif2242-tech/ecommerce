<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiChatController extends Controller
{
    /**
     * Get active shopping categories
     */
    public function categories()
    {
        $categories = Category::where('status', 1)
            ->orderBy('sort_order')
            ->get([
                'category_id',
                'name',
                'slug',
                'image'
            ]);

        return response()->json([
            'success' => true,
            'categories' => $categories
        ]);
    }

    /**
     * AI Shopping Chat
     */
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'category_id' => 'nullable|string',
            'history' => 'nullable|array',
        ]);

        $message = trim($request->message);
        $categoryId = $request->category_id;
        $history = $request->history ?? [];

        /*
        |--------------------------------------------------------------------------
        | Find selected category
        |--------------------------------------------------------------------------
        */

        $category = null;

        if ($categoryId) {
            $category = Category::where('category_id', $categoryId)
                ->where('status', 1)
                ->first();
        }

        /*
        |--------------------------------------------------------------------------
        | Search text
        |--------------------------------------------------------------------------
        */

        $searchText = strtolower($message);

        /*
        |--------------------------------------------------------------------------
        | Detect gender
        |--------------------------------------------------------------------------
        */

        $isWomen = preg_match(
            '/\b(women|woman|womens|women\'s|female|ladies|lady)\b/i',
            $searchText
        );

        $isMen = preg_match(
            '/\b(men|man|mens|men\'s|male)\b/i',
            $searchText
        );

        /*
        |--------------------------------------------------------------------------
        | Detect product keywords
        |--------------------------------------------------------------------------
        */

        $stopWords = [
            'the',
            'for',
            'and',
            'with',
            'show',
            'give',
            'want',
            'need',
            'have',
            'does',
            'this',
            'that',
            'you',
            'your',
            'please',
            'tell',
            'about',
            'price',
            'available',
            'product',
            'products',
            'please',
            'me',
            'some',
            'any',
            'can',
            'could',
            'would',
            'find',
            'looking',
            'shop',
            'buy',
        ];

        $keywords = collect(
            preg_split(
                '/\s+/',
                preg_replace('/[^a-zA-Z0-9\s]/', '', $searchText)
            )
        )
            ->filter(function ($word) use ($stopWords) {
                return strlen($word) >= 3 &&
                    !in_array($word, $stopWords);
            })
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Product Query
        |--------------------------------------------------------------------------
        */

        $productsQuery = Product::with('category')
            ->where('status', 1);

        /*
        |--------------------------------------------------------------------------
        | Search actual product names
        |--------------------------------------------------------------------------
        */

        if ($keywords->isNotEmpty()) {

            $productsQuery->where(function ($query) use ($keywords) {

                foreach ($keywords as $keyword) {

                    $query->orWhere(
                        'name',
                        'LIKE',
                        '%' . $keyword . '%'
                    );

                    $query->orWhereHas(
                        'category',
                        function ($categoryQuery) use ($keyword) {

                            $categoryQuery->where(
                                'name',
                                'LIKE',
                                '%' . $keyword . '%'
                            );
                        }
                    );
                }
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Gender filtering
        |--------------------------------------------------------------------------
        |
        | IMPORTANT:
        | "women leather jacket" must NOT return
        | "MEN LEATHER JACKET".
        |
        */

        if ($isWomen) {

            $productsQuery->where(function ($query) {

                $query->where('name', 'LIKE', '%women%')
                    ->orWhere('name', 'LIKE', '%woman%')
                    ->orWhere('name', 'LIKE', '%ladies%')
                    ->orWhere('name', 'LIKE', '%lady%')
                    ->orWhereHas('category', function ($categoryQuery) {

                        $categoryQuery
                            ->where('name', 'LIKE', '%women%')
                            ->orWhere('name', 'LIKE', '%ladies%')
                            ->orWhere('name', 'LIKE', '%female%');
                    });
            });
        }

        if ($isMen) {

            $productsQuery->where(function ($query) {

                $query->where('name', 'LIKE', '%men%')
                    ->orWhere('name', 'LIKE', '%man%')
                    ->orWhere('name', 'LIKE', '%male%')
                    ->orWhereHas('category', function ($categoryQuery) {

                        $categoryQuery
                            ->where('name', 'LIKE', '%men%')
                            ->orWhere('name', 'LIKE', '%male%');
                    });
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Selected category
        |--------------------------------------------------------------------------
        */

        if ($category) {

            $categoryProducts = (clone $productsQuery)
                ->where('category_id', $category->id)
                ->orderBy('stock', 'desc')
                ->limit(15)
                ->get();

        } else {

            $categoryProducts = collect();
        }

        /*
        |--------------------------------------------------------------------------
        | General matching products
        |--------------------------------------------------------------------------
        */

        $matchingProducts = $productsQuery
            ->orderBy('stock', 'desc')
            ->limit(15)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Combine
        |--------------------------------------------------------------------------
        */

        $products = $categoryProducts
            ->concat($matchingProducts)
            ->unique('product_id')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Product Data
        |--------------------------------------------------------------------------
        */

        $productData = $products->map(function ($product) {

            $finalPrice = $product->discount_price
                ?: $product->price;

            return [
                'product_id' => $product->product_id,

                'name' => $product->name,

                'category' => $product->category?->name,

                'price' => (float) $product->price,

                'discount_price' =>
                    $product->discount_price !== null
                        ? (float) $product->discount_price
                        : null,

                'final_price' => (float) $finalPrice,

                'stock' => (int) $product->stock,

                'available' => (int) $product->stock > 0,

                'url' => route(
                    'product.show',
                    $product->slug
                ),
            ];

        })->values();

        /*
        |--------------------------------------------------------------------------
        | Category Name
        |--------------------------------------------------------------------------
        */

        $categoryName = $category
            ? $category->name
            : 'All Kaira products';

        /*
        |--------------------------------------------------------------------------
        | FAST DIRECT RESPONSE
        |--------------------------------------------------------------------------
        |
        | If there are no matching products, don't waste time
        | sending a large request to Ollama.
        |
        */

        if (
            $keywords->isNotEmpty() &&
            $products->isEmpty()
        ) {

            return response()->json([
                'success' => true,
                'message' =>
                    "Sorry, we don't currently have that product."
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | System Prompt
        |--------------------------------------------------------------------------
        */

        $systemPrompt = <<<PROMPT
You are Kaira AI, a shopping assistant for the Kaira ecommerce store.

STORE:
Kaira.

CURRENT CATEGORY:
{$categoryName}

STRICT PRODUCT RULES:

1. ONLY use products in PRODUCT DATA.
2. NEVER invent products.
3. NEVER invent prices.
4. NEVER invent stock.
5. NEVER invent brands.
6. NEVER claim a product exists unless it is in PRODUCT DATA.
7. If no suitable product exists, say:
"Sorry, we don't currently have that product."

GENDER:

If the customer asks for women's products, ONLY recommend products that are clearly women's/female/ladies products.

If the customer asks for men's products, ONLY recommend men's/male products.

NEVER recommend a men's product for a women's request.

PRICE:

Use final_price as the current price when discount_price exists.

Use Pakistani Rupees.

Example:
Rs. 4,000

Never use dollars.

STOCK:

stock greater than 0 = Available.

stock equal to 0 = Currently out of stock.

PRODUCT MATCHING:

Match the customer's request to the actual product name and category.

If customer asks for "leather jacket", do not recommend a dress.

If customer asks for "women leather jacket", do not recommend a men's jacket.

Only recommend genuinely matching products.

CONVERSATION:

Use conversation history for follow-up questions.

Keep answers short and friendly.

URL:

Use the exact URL provided in PRODUCT DATA.

Never create or modify URLs.

Never mention Laravel, PHP, MySQL, database, API, Ollama, server, programming or technical details.

PRODUCT DATA:

{$productData->toJson(JSON_PRETTY_PRINT)}

FINAL RULE:

Use ONLY PRODUCT DATA.
NEVER GUESS.
NEVER INVENT.
PROMPT;

        /*
        |--------------------------------------------------------------------------
        | Messages
        |--------------------------------------------------------------------------
        */

        $messages = [
            [
                'role' => 'system',
                'content' => $systemPrompt
            ]
        ];

        /*
        |--------------------------------------------------------------------------
        | Keep only recent history
        |--------------------------------------------------------------------------
        */

        foreach (array_slice($history, -6) as $item) {

            if (
                !isset($item['role']) ||
                !isset($item['content'])
            ) {
                continue;
            }

            if (
                !in_array(
                    $item['role'],
                    ['user', 'assistant'],
                    true
                )
            ) {
                continue;
            }

            $content = trim(
                (string) $item['content']
            );

            if ($content === '') {
                continue;
            }

            $messages[] = [
                'role' => $item['role'],
                'content' => $content
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Current Message
        |--------------------------------------------------------------------------
        */

        $messages[] = [
            'role' => 'user',
            'content' => $message
        ];

        /*
        |--------------------------------------------------------------------------
        | Ollama
        |--------------------------------------------------------------------------
        */

        try {

            $response = Http::timeout(60)
                ->post(
                    'http://127.0.0.1:11434/api/chat',
                    [
                        'model' => 'llama3.2:latest',

                        'stream' => false,

                        'keep_alive' => '30m',

                        'messages' => $messages,

                        'options' => [
                            'temperature' => 0,
                            'num_predict' => 120,
                        ],
                    ]
                );

            /*
            |--------------------------------------------------------------------------
            | Check response
            |--------------------------------------------------------------------------
            */

            if (!$response->successful()) {

                return response()->json([
                    'success' => false,
                    'message' =>
                        'Kaira AI is currently unavailable.'
                ], 500);
            }

            /*
            |--------------------------------------------------------------------------
            | Decode response
            |--------------------------------------------------------------------------
            */

            $data = $response->json();

            $aiMessage =
                $data['message']['content']
                ?? 'Sorry, I could not generate a response.';

            /*
            |--------------------------------------------------------------------------
            | Return
            |--------------------------------------------------------------------------
            */

            return response()->json([
                'success' => true,
                'message' => trim($aiMessage),
            ]);

        } catch (\Throwable $e) {

            return response()->json([
                'success' => false,
                'message' =>
                    'Kaira AI is currently unavailable. Please try again.'
            ], 500);
        }
    }
}