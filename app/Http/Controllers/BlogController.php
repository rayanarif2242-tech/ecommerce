<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    /**
     * Display Blog List
     */
    public function index(Request $request)
    {
        $blog = Blog::when($request->search, function ($query) use ($request) {

            $query->where('blog_id', 'like', '%' . $request->search . '%')
                  ->orWhere('title', 'like', '%' . $request->search . '%')
                  ->orWhere('slug', 'like', '%' . $request->search . '%');

        })
        ->latest()
        ->get();


        return view('admin.blog.index', compact('blog'));
    }



    /**
     * Create Blog Form
     */
    public function create()
    {
        return view('admin.blog.create');
    }



    /**
     * Store Blog
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        $image = null;


        if ($request->hasFile('image')) {

            $image = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/blog'),
                $image
            );
        }



        Blog::create([

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'image' => $image,

            'category' => $request->category,

            'author' => $request->author,

            'short_description' => $request->short_description,

            'content' => $request->content,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,

            'featured' => $request->featured ?? 0,

            'show_on_home' => $request->show_on_home ?? 0,

            'status' => $request->status ?? 1,

            'sort_order' => $request->sort_order ?? 0,

        ]);


        return redirect()
            ->route('blog.index')
            ->with('success','Blog Created Successfully');
    }




    /**
     * Edit Blog
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }




    /**
     * Update Blog
     */
    public function update(Request $request, Blog $blog)
    {

        $request->validate([

            'title' => 'required',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);



        $image = $blog->image;



        if ($request->hasFile('image')) {


            if ($blog->image &&
                file_exists(public_path('uploads/blog/'.$blog->image))) {

                unlink(public_path('uploads/blog/'.$blog->image));

            }


            $image = time().'.'.$request->image->extension();


            $request->image->move(
                public_path('uploads/blog'),
                $image
            );
        }




        $blog->update([

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'image' => $image,

            'category' => $request->category,

            'author' => $request->author,

            'short_description' => $request->short_description,

            'content' => $request->content,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,

            'featured' => $request->featured ?? 0,

            'show_on_home' => $request->show_on_home ?? 0,

            'status' => $request->status ?? 1,

            'sort_order' => $request->sort_order ?? 0,

        ]);



        return redirect()
            ->route('blog.index')
            ->with('success','Blog Updated Successfully');

    }




    /**
     * Delete Blog
     */
    public function destroy(Blog $blog)
    {

        if ($blog->image &&
            file_exists(public_path('uploads/blog/'.$blog->image))) {

            unlink(public_path('uploads/blog/'.$blog->image));

        }


        $blog->delete();



        return redirect()
            ->route('blog.index')
            ->with('success','Blog Deleted Successfully');
    }

}