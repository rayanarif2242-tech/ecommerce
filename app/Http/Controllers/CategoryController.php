<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Display all categories
    public function index()
    {
        $categories = Category::with('parent')->latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.category.create', compact('categories'));
    }

    // Store category
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:categories,name',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time() . '_' . $request->image->getClientOriginalName();

            $request->image->move(public_path('uploads/categories'), $imageName);
        }

        Category::create([
            'category_id'      => Str::uuid(),
            'name'             => $request->name,
            'slug'             => Str::slug($request->name),
            'description'      => $request->description,
            'image'            => $imageName,
            'parent_id'        => $request->parent_id,
            'featured'         => $request->featured ?? 0,
            'show_on_home'     => $request->show_on_home ?? 0,
            'status'           => $request->status ?? 1,
            'sort_order'       => $request->sort_order ?? 0,
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Category added successfully.');
    }

    // Show edit form
    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();

        return view('admin.category.edit', compact('category', 'categories'));
    }

    // Update category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'  => 'required|unique:categories,name,' . $category->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = $category->image;

        if ($request->hasFile('image')) {

            if (
                $category->image &&
                file_exists(public_path('uploads/categories/' . $category->image))
            ) {
                unlink(public_path('uploads/categories/' . $category->image));
            }

            $imageName = time() . '_' . $request->image->getClientOriginalName();

            $request->image->move(public_path('uploads/categories'), $imageName);
        }

        $category->update([
            'name'             => $request->name,
            'slug'             => Str::slug($request->name),
            'description'      => $request->description,
            'image'            => $imageName,
            'parent_id'        => $request->parent_id,
            'featured'         => $request->featured ?? 0,
            'show_on_home'     => $request->show_on_home ?? 0,
            'status'           => $request->status ?? 1,
            'sort_order'       => $request->sort_order ?? 0,
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully.');
    }

    // Delete category
    public function destroy(Category $category)
    {
        if (
            $category->image &&
            file_exists(public_path('uploads/categories/' . $category->image))
        ) {
            unlink(public_path('uploads/categories/' . $category->image));
        }

        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully.');
    }
}