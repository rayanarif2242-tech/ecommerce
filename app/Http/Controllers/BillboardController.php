<?php

namespace App\Http\Controllers;

use App\Models\Billboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BillboardController extends Controller
{
    /**
     * Display all billboards.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $billboards = Billboard::when($search, function ($query) use ($search) {

            $query->where('billboard_id', 'LIKE', "%{$search}%")
                  ->orWhere('name', 'LIKE', "%{$search}%")
                  ->orWhere('title', 'LIKE', "%{$search}%");

        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('admin.billboards.index', compact(
            'billboards',
            'search'
        ));
    }


    /**
     * Show create billboard form.
     */
    public function create()
    {
        return view('admin.billboards.create');
    }


    /**
     * Store new billboard.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'title' => 'nullable|string|max:255',

            'subtitle' => 'nullable|string|max:255',

            'description' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'button_text' => 'nullable|string|max:100',

            'button_link' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer',

        ]);


        $billboard = new Billboard();

        $billboard->name = $request->name;

        $billboard->title = $request->title;

        $billboard->subtitle = $request->subtitle;

        $billboard->description = $request->description;

        $billboard->button_text = $request->button_text;

        $billboard->button_link = $request->button_link;

        $billboard->featured = $request->featured ?? 0;

        $billboard->show_home = $request->show_home ?? 0;

        $billboard->status = $request->status ?? 1;

        $billboard->sort_order = $request->sort_order ?? 0;


        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $name = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads/billboards'),
                $name
            );

            $billboard->image = $name;
        }


        $billboard->save();


        return redirect()
            ->route('billboards.index')
            ->with('success', 'Billboard created successfully.');
    }


    /**
     * Display billboard details.
     */
    public function show(Billboard $billboard)
    {
        return view(
            'admin.billboards.show',
            compact('billboard')
        );
    }


    /**
     * Show edit billboard form.
     */
    public function edit(Billboard $billboard)
    {
        return view(
            'admin.billboards.edit',
            compact('billboard')
        );
    }


    /**
     * Update billboard.
     */
    public function update(
        Request $request,
        Billboard $billboard
    ) {

        $request->validate([

            'name' => 'required|string|max:255',

            'title' => 'nullable|string|max:255',

            'subtitle' => 'nullable|string|max:255',

            'description' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'button_text' => 'nullable|string|max:100',

            'button_link' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer',

        ]);


        $billboard->name = $request->name;

        $billboard->title = $request->title;

        $billboard->subtitle = $request->subtitle;

        $billboard->description = $request->description;

        $billboard->button_text = $request->button_text;

        $billboard->button_link = $request->button_link;

        $billboard->featured = $request->featured ?? 0;

        $billboard->show_home = $request->show_home ?? 0;

        $billboard->status = $request->status ?? 1;

        $billboard->sort_order = $request->sort_order ?? 0;


        /*
        |--------------------------------------------------------------------------
        | Replace Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            // Delete old image

            if (
                $billboard->image &&
                File::exists(
                    public_path(
                        'uploads/billboards/' .
                        $billboard->image
                    )
                )
            ) {

                File::delete(
                    public_path(
                        'uploads/billboards/' .
                        $billboard->image
                    )
                );
            }


            // Upload new image

            $image = $request->file('image');

            $name = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads/billboards'),
                $name
            );

            $billboard->image = $name;
        }


        $billboard->save();


        return redirect()
            ->route('billboards.index')
            ->with('success', 'Billboard updated successfully.');
    }


    /**
     * Delete billboard.
     */
    public function destroy(Billboard $billboard)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Image
        |--------------------------------------------------------------------------
        */

        if (
            $billboard->image &&
            File::exists(
                public_path(
                    'uploads/billboards/' .
                    $billboard->image
                )
            )
        ) {

            File::delete(
                public_path(
                    'uploads/billboards/' .
                    $billboard->image
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Billboard
        |--------------------------------------------------------------------------
        */

        $billboard->delete();


        return redirect()
            ->route('billboards.index')
            ->with('success', 'Billboard deleted successfully.');
    }
}