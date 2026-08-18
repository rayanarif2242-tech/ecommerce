<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $query = Testimonial::query();

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('testimonial_id', 'like', '%' . $search . '%')
                    ->orWhere('product_name', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');

            });
        }

        $testimonials = $query
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.testimonial.index',
            compact('testimonials')
        );
    }


    public function create()
    {
        return view('admin.testimonial.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',

            'active' => 'nullable|boolean',
            'show_on_home' => 'nullable|boolean',

            'sort_order' => 'nullable|integer|min:0',

            'price' => 'nullable|numeric|min:0',

            'discount_price' =>
                'nullable|numeric|min:0|lte:price',

            'description' => 'nullable|string',
        ]);


        Testimonial::create([

            'product_name' => $request->product_name,

            'title' => $request->title,

            'active' =>
                $request->has('active') ? 1 : 0,

            'show_on_home' =>
                $request->has('show_on_home') ? 1 : 0,

            'sort_order' =>
                $request->sort_order ?? 0,

            'price' =>
                $request->price,

            'discount_price' =>
                $request->discount_price,

            'description' =>
                $request->description,
        ]);


        return redirect()
            ->route('admin.testimonial.index')
            ->with(
                'success',
                'Testimonial created successfully.'
            );
    }


    public function show(Testimonial $testimonial)
    {
        return view(
            'admin.testimonial.show',
            compact('testimonial')
        );
    }


    public function edit(Testimonial $testimonial)
    {
        return view(
            'admin.testimonial.edit',
            compact('testimonial')
        );
    }


    public function update(
        Request $request,
        Testimonial $testimonial
    ) {

        $request->validate([
            'product_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',

            'active' => 'nullable|boolean',
            'show_on_home' => 'nullable|boolean',

            'sort_order' => 'nullable|integer|min:0',

            'price' => 'nullable|numeric|min:0',

            'discount_price' =>
                'nullable|numeric|min:0|lte:price',

            'description' => 'nullable|string',
        ]);


        $testimonial->update([

            'product_name' =>
                $request->product_name,

            'title' =>
                $request->title,

            'active' =>
                $request->has('active') ? 1 : 0,

            'show_on_home' =>
                $request->has('show_on_home') ? 1 : 0,

            'sort_order' =>
                $request->sort_order ?? 0,

            'price' =>
                $request->price,

            'discount_price' =>
                $request->discount_price,

            'description' =>
                $request->description,
        ]);


        return redirect()
            ->route(
                'admin.testimonial.index'
            )
            ->with(
                'success',
                'Testimonial updated successfully.'
            );
    }


    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()
            ->route(
                'admin.testimonial.index'
            )
            ->with(
                'success',
                'Testimonial deleted successfully.'
            );
    }
}