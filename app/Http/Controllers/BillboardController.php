<?php

namespace App\Http\Controllers;

use App\Models\Billboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BillboardController extends Controller
{
    /**
     * Display all billboards.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $billboards = Billboard::when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {
                $q->where('billboard_id', 'LIKE', "%{$search}%")
                  ->orWhere('title', 'LIKE', "%{$search}%")
                  ->orWhere('subtitle', 'LIKE', "%{$search}%");
            });

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

            'title' => 'required|string|max:255',

            'subtitle' => 'nullable|string|max:255',

            'button_text' => 'nullable|string|max:100',

            'button_link' => 'nullable|string|max:255',

            'position' => 'required|string|max:100',

            'featured' => 'required|boolean',

            'status' => 'required|boolean',

            'sort_order' => 'nullable|integer',

            'start_date' => 'nullable|date',

            'end_date' => 'nullable|date|after_or_equal:start_date',

            'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

        ]);


        $billboard = new Billboard();

        // Generate UUID
        $billboard->billboard_id = (string) Str::uuid();

        // Basic information
        $billboard->title = $request->title;
        $billboard->subtitle = $request->subtitle;
        $billboard->button_text = $request->button_text;
        $billboard->button_link = $request->button_link;

        // Settings
        $billboard->position = $request->position;
        $billboard->featured = $request->featured ?? 0;
        $billboard->status = $request->status ?? 1;
        $billboard->sort_order = $request->sort_order ?? 0;

        // Dates
        $billboard->start_date = $request->start_date;
        $billboard->end_date = $request->end_date;


        /*
        |--------------------------------------------------------------------------
        | Create Billboard Upload Directory
        |--------------------------------------------------------------------------
        */

        $uploadPath = public_path('uploads/billboards');

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }


        /*
        |--------------------------------------------------------------------------
        | Desktop Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $fileName = time() . '_desktop_' . $image->getClientOriginalName();

            $image->move($uploadPath, $fileName);

            $billboard->image = $fileName;
        }


        /*
        |--------------------------------------------------------------------------
        | Mobile Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('mobile_image')) {

            $mobileImage = $request->file('mobile_image');

            $mobileFileName = time() . '_mobile_' . $mobileImage->getClientOriginalName();

            $mobileImage->move($uploadPath, $mobileFileName);

            $billboard->mobile_image = $mobileFileName;
        }


        $billboard->save();


        return redirect()
            ->route('admin.billboards.index')
            ->with('success', 'Billboard created successfully.');
    }


    /**
     * Display billboard details in admin.
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
    public function update(Request $request, Billboard $billboard)
    {
        $request->validate([

            'title' => 'required|string|max:255',

            'subtitle' => 'nullable|string|max:255',

            'button_text' => 'nullable|string|max:100',

            'button_link' => 'nullable|string|max:255',

            'position' => 'required|string|max:100',

            'featured' => 'required|boolean',

            'status' => 'required|boolean',

            'sort_order' => 'nullable|integer',

            'start_date' => 'nullable|date',

            'end_date' => 'nullable|date|after_or_equal:start_date',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

        ]);


        $billboard->title = $request->title;
        $billboard->subtitle = $request->subtitle;
        $billboard->button_text = $request->button_text;
        $billboard->button_link = $request->button_link;

        $billboard->position = $request->position;
        $billboard->featured = $request->featured ?? 0;
        $billboard->status = $request->status ?? 1;
        $billboard->sort_order = $request->sort_order ?? 0;

        $billboard->start_date = $request->start_date;
        $billboard->end_date = $request->end_date;


        /*
        |--------------------------------------------------------------------------
        | Upload Directory
        |--------------------------------------------------------------------------
        */

        $uploadPath = public_path('uploads/billboards');

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }


        /*
        |--------------------------------------------------------------------------
        | Replace Desktop Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            if (
                $billboard->image &&
                File::exists(
                    $uploadPath . '/' . $billboard->image
                )
            ) {
                File::delete(
                    $uploadPath . '/' . $billboard->image
                );
            }


            $image = $request->file('image');

            $fileName = time() . '_desktop_' . $image->getClientOriginalName();

            $image->move($uploadPath, $fileName);

            $billboard->image = $fileName;
        }


        /*
        |--------------------------------------------------------------------------
        | Replace Mobile Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('mobile_image')) {

            if (
                $billboard->mobile_image &&
                File::exists(
                    $uploadPath . '/' . $billboard->mobile_image
                )
            ) {
                File::delete(
                    $uploadPath . '/' . $billboard->mobile_image
                );
            }


            $mobileImage = $request->file('mobile_image');

            $mobileFileName = time() . '_mobile_' . $mobileImage->getClientOriginalName();

            $mobileImage->move($uploadPath, $mobileFileName);

            $billboard->mobile_image = $mobileFileName;
        }


        $billboard->save();


        return redirect()
            ->route('admin.billboards.index')
            ->with('success', 'Billboard updated successfully.');
    }


    /**
     * Delete billboard.
     */
    public function destroy(Billboard $billboard)
    {
        $uploadPath = public_path('uploads/billboards');


        // Delete desktop image
        if (
            $billboard->image &&
            File::exists(
                $uploadPath . '/' . $billboard->image
            )
        ) {
            File::delete(
                $uploadPath . '/' . $billboard->image
            );
        }


        // Delete mobile image
        if (
            $billboard->mobile_image &&
            File::exists(
                $uploadPath . '/' . $billboard->mobile_image
            )
        ) {
            File::delete(
                $uploadPath . '/' . $billboard->mobile_image
            );
        }


        $billboard->delete();


        return redirect()
            ->route('admin.billboards.index')
            ->with('success', 'Billboard deleted successfully.');
    }


    /**
     * Display billboard detail on frontend.
     */
    public function detail($billboard_id)
    {
        $billboard = Billboard::where('billboard_id', $billboard_id)
            ->where('status', 1)
            ->firstOrFail();

        return view(
            'user.billboard-detail',
            compact('billboard')
        );
    }
}