<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{

    $query = ContactMessage::query();


    if($request->search)
    {

        $search = $request->search;


        $query->where('message_id','like',"%$search%")
        ->orWhere('name','like',"%$search%")
        ->orWhere('email','like',"%$search%")
        ->orWhere('phone','like',"%$search%")
        ->orWhere('subject','like',"%$search%")
        ->orWhere('status','like',"%$search%");

    }


    $messages = $query
        ->latest()
        ->paginate(10);


    return view(
        'admin.contact_messages.index',
        compact('messages')
    );

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('admin.contact_messages.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    $request->validate([

        'name'=>'required',
        'email'=>'required|email',
        'phone'=>'nullable',
        'subject'=>'required',
        'message'=>'required',
        'status'=>'required'

    ]);


    ContactMessage::create([

        'name'=>$request->name,

        'email'=>$request->email,

        'phone'=>$request->phone,

        'subject'=>$request->subject,

        'message'=>$request->message,

        'status'=>$request->status

    ]);


    return redirect()
    ->route('contact-messages.index')
    ->with('success','Contact Message Added Successfully');

}

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $contactMessage)
{

    // Change status automatically
    if($contactMessage->status == "New")
    {
        $contactMessage->update([
            'status'=>'Read'
        ]);
    }


    return view(
        'admin.contact_messages.show',
        compact('contactMessage')
    );

}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactMessage $contactMessage)
{
    return view(
        'admin.contact_messages.edit',
        compact('contactMessage')
    );
}
    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, ContactMessage $contactMessage)
{

    $request->validate([

        'name'=>'required',

        'email'=>'required|email',

        'phone'=>'nullable',

        'subject'=>'required',

        'message'=>'required',

        'status'=>'required'

    ]);



    $contactMessage->update([

        'name'=>$request->name,

        'email'=>$request->email,

        'phone'=>$request->phone,

        'subject'=>$request->subject,

        'message'=>$request->message,

        'status'=>$request->status

    ]);



    return redirect()
    ->route('contact-messages.index')
    ->with(
        'success',
        'Contact Message Updated Successfully'
    );

}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $contactMessage)
{

    $contactMessage->delete();


    return redirect()
    ->route('contact-messages.index')
    ->with(
        'success',
        'Contact Message Deleted Successfully'
    );

}
}

