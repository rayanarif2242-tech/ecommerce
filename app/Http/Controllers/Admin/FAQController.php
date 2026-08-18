<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;


class FAQController extends Controller
{

    public function index(Request $request)
{

    $query = FAQ::query();


    // Search
    if($request->search){

        $query->where('question','like','%'.$request->search.'%');

    }



    // Status Filter
    if($request->status){

        $query->where('status',$request->status);

    }



    $faqs = $query->latest()->paginate(10);


    return view('admin.faq.index',compact('faqs'));

}



    public function create()
    {

        return view('admin.faq.create');

    }



    public function store(Request $request)
    {

        $request->validate([

            'question'=>'required',
            'answer'=>'required'

        ]);


        FAQ::create([

            'question'=>$request->question,

            'answer'=>$request->answer,

            'status'=>$request->status,

            'order'=>$request->order

        ]);


        return redirect()
        ->route('faq.index')
        ->with('success','FAQ Added Successfully');

    }




    public function edit(FAQ $faq)
    {

        return view('admin.faq.edit',compact('faq'));

    }



    public function update(Request $request, FAQ $faq)
    {

        $faq->update([

            'question'=>$request->question,

            'answer'=>$request->answer,

            'status'=>$request->status,

            'order'=>$request->order

        ]);


        return redirect()
        ->route('faq.index')
        ->with('success','FAQ Updated Successfully');

    }



    public function destroy(FAQ $faq)
    {

        $faq->delete();


        return redirect()
        ->route('faq.index')
        ->with('success','FAQ Deleted Successfully');

    }


}