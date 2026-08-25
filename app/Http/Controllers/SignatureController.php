<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SignatureController extends Controller
{
    /**
     * Display signatures.
     */
    public function index(Request $request)
    {
        $signatures = Signature::query()
            ->when($request->search, function ($query) use ($request) {

                $search = $request->search;

                $query->where('signature_id', 'like', "%{$search}%")
                      ->orWhere('product_name', 'like', "%{$search}%");

            })
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.signature.index', compact('signatures'));
    }


    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.signature.create');
    }


    /**
     * Store signature.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'show_on_home' => 'nullable|boolean',
            'status' => 'required|in:Active,Inactive',
        ]);

        $signature = new Signature();

        $signature->product_name = $request->product_name;
        $signature->description = $request->description;
        $signature->price = $request->price;
        $signature->discount_price = $request->discount_price;
        $signature->sort_order = $request->sort_order ?? 0;
        $signature->show_on_home = $request->boolean('show_on_home');
        $signature->status = $request->status;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads/signatures'),
                $imageName
            );

            $signature->image = 'uploads/signatures/' . $imageName;
        }

        $signature->save();

        return redirect()
            ->route('admin.signature.index')
            ->with('success', 'Signature added successfully.');
    }


    /**
     * Show single signature.
     */
    public function show(Signature $signature)
    {
        return view('admin.signature.show', compact('signature'));
    }


    /**
     * Show edit form.
     */
    public function edit(Signature $signature)
    {
        return view('admin.signature.edit', compact('signature'));
    }


    /**
     * Update signature.
     */
    public function update(Request $request, Signature $signature)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => $request->stock,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'show_on_home' => 'nullable|boolean',
            'status' => 'required|in:Active,Inactive',
        ]);

        $signature->product_name = $request->product_name;
        $signature->description = $request->description;
        $signature->price = $request->price;
        $signature->discount_price = $request->discount_price;
        $signature->sort_order = $request->sort_order ?? 0;
        $signature->show_on_home = $request->boolean('show_on_home');
        $signature->status = $request->status;

        if ($request->hasFile('image')) {

            if (
                $signature->image &&
                File::exists(public_path($signature->image))
            ) {
                File::delete(public_path($signature->image));
            }

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads/signatures'),
                $imageName
            );

            $signature->image = 'uploads/signatures/' . $imageName;
        }

        $signature->save();

        return redirect()
            ->route('admin.signature.index')
            ->with('success', 'Signature updated successfully.');
    }


    /**
     * Delete signature.
     */
    public function destroy(Signature $signature)
    {
        if (
            $signature->image &&
            File::exists(public_path($signature->image))
        ) {
            File::delete(public_path($signature->image));
        }

        $signature->delete();

        return redirect()
            ->route('admin.signature.index')
            ->with('success', 'Signature deleted successfully.');
    }
  public function frontendIndex()
{
    $signatures = Signature::where('status', 'Active')
        ->orderBy('sort_order', 'asc')
        ->get();

    return view('user.signatures', compact('signatures'));
}


public function frontendShow($signature_id)
{
    $signature = Signature::where('signature_id', $signature_id)
        ->where('status', 'Active')
        ->firstOrFail();

    return view('user.signature-detail', compact('signature'));
}
}