<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Variety;
use App\Models\Product;
use Illuminate\Http\Request;

class VarietyController extends Controller
{
    /**
     * Display all varieties.
     */
    public function index()
    {
        $varieties = Variety::with('product')
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15);

        return view('admin.varieties.index', compact('varieties'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('admin.varieties.create', compact('products'));
    }

    /**
     * Store new variety.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'nullable|uuid',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:500',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'position' => 'nullable|string|max:100',
            'featured' => 'nullable|boolean',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer|min:0',

            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Featured
        |--------------------------------------------------------------------------
        */

        $validated['featured'] = $request->has('featured');

        /*
        |--------------------------------------------------------------------------
        | Create Varieties Upload Folder
        |--------------------------------------------------------------------------
        */

        $uploadPath = public_path('uploads/varieties');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        /*
        |--------------------------------------------------------------------------
        | Upload Desktop Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move($uploadPath, $imageName);

            $validated['image'] = $imageName;
        }

        /*
        |--------------------------------------------------------------------------
        | Upload Mobile Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('mobile_image')) {

            $mobileImage = $request->file('mobile_image');

            $mobileImageName = time() . '_mobile_' . uniqid() . '.' . $mobileImage->getClientOriginalExtension();

            $mobileImage->move($uploadPath, $mobileImageName);

            $validated['mobile_image'] = $mobileImageName;
        }

        /*
        |--------------------------------------------------------------------------
        | Create Variety
        |--------------------------------------------------------------------------
        */

        Variety::create($validated);

        return redirect()
            ->route('admin.varieties.index')
            ->with('success', 'Variety created successfully.');
    }

    /**
     * Display one variety.
     */
    public function show(Variety $variety)
    {
        $variety->load('product');

        return view('admin.varieties.show', compact('variety'));
    }

    /**
     * Show edit form.
     */
    public function edit(Variety $variety)
    {
        $products = Product::orderBy('name')->get();

        return view(
            'admin.varieties.edit',
            compact('variety', 'products')
        );
    }

    /**
     * Update variety.
     */
    public function update(Request $request, Variety $variety)
    {
        $validated = $request->validate([
            'product_id' => 'nullable|uuid',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:500',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'position' => 'nullable|string|max:100',
            'featured' => 'nullable|boolean',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer|min:0',

            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Featured
        |--------------------------------------------------------------------------
        */

        $validated['featured'] = $request->has('featured');

        /*
        |--------------------------------------------------------------------------
        | Create Upload Folder If Missing
        |--------------------------------------------------------------------------
        */

        $uploadPath = public_path('uploads/varieties');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        /*
        |--------------------------------------------------------------------------
        | Replace Desktop Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            // Delete old desktop image
            if ($variety->image) {

                $oldImage = $uploadPath . '/' . $variety->image;

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            // Upload new desktop image
            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move($uploadPath, $imageName);

            $validated['image'] = $imageName;
        }

        /*
        |--------------------------------------------------------------------------
        | Replace Mobile Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('mobile_image')) {

            // Delete old mobile image
            if ($variety->mobile_image) {

                $oldMobileImage = $uploadPath . '/' . $variety->mobile_image;

                if (file_exists($oldMobileImage)) {
                    unlink($oldMobileImage);
                }
            }

            // Upload new mobile image
            $mobileImage = $request->file('mobile_image');

            $mobileImageName = time() . '_mobile_' . uniqid() . '.' . $mobileImage->getClientOriginalExtension();

            $mobileImage->move($uploadPath, $mobileImageName);

            $validated['mobile_image'] = $mobileImageName;
        }

        /*
        |--------------------------------------------------------------------------
        | Update Variety
        |--------------------------------------------------------------------------
        */

        $variety->update($validated);

        return redirect()
            ->route('admin.varieties.index')
            ->with('success', 'Variety updated successfully.');
    }

    /**
     * Delete variety.
     */
    public function destroy(Variety $variety)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Desktop Image
        |--------------------------------------------------------------------------
        */

        if ($variety->image) {

            $imagePath = public_path(
                'uploads/varieties/' . $variety->image
            );

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Mobile Image
        |--------------------------------------------------------------------------
        */

        if ($variety->mobile_image) {

            $mobileImagePath = public_path(
                'uploads/varieties/' . $variety->mobile_image
            );

            if (file_exists($mobileImagePath)) {
                unlink($mobileImagePath);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Database Record
        |--------------------------------------------------------------------------
        */

        $variety->delete();

        return redirect()
            ->route('admin.varieties.index')
            ->with('success', 'Variety deleted successfully.');
    }
}

