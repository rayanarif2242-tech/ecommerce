<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display Users and Newsletter Subscribers.
     */
    public function index()
    {
        $users = User::latest()->get();

        $subscribers = NewsletterSubscriber::latest()->get();

        return view(
            'admin.users.index',
            compact('users', 'subscribers')
        );
    }


    /**
     * Show create user form.
     */
    public function create()
    {
        return view('admin.users.create');
    }


    /**
     * Store a new user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'email' => 'required|email|max:255|unique:users,email',

            'password' => 'required|string|min:6',
        ]);

        User::create([
            'uuid' => (string) Str::uuid(),

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User Created Successfully');
    }


    /**
     * Show edit user form.
     */
    public function edit($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        return view(
            'admin.users.edit',
            compact('user')
        );
    }


    /**
     * Update user.
     */
    public function update(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',

            'email' =>
                'required|email|max:255|unique:users,email,' . $user->id,

            'password' => 'nullable|string|min:6',
        ]);

        $user->name = $request->name;

        $user->email = $request->email;


        // Update password only if entered
        if ($request->filled('password')) {

            $user->password = Hash::make(
                $request->password
            );
        }

        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User Updated Successfully');
    }


    /**
     * Delete user.
     */
    public function destroy($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User Deleted Successfully');
    }


    /**
     * Add newsletter subscriber.
     */
    public function storeSubscriber(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255|unique:newsletter_subscribers,email',

            'status' => 'required|in:Active,Inactive',
        ]);

        NewsletterSubscriber::create([
            'subscriber_id' => (string) Str::uuid(),

            'email' => $request->email,

            'status' => $request->status,

            'subscribed_at' => now(),
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'Newsletter subscriber added successfully.'
            );
    }


    /**
     * Remove newsletter subscriber.
     */
    public function destroySubscriber($subscriber_id)
    {
        $subscriber = NewsletterSubscriber::where(
            'subscriber_id',
            $subscriber_id
        )->firstOrFail();

        $subscriber->delete();

        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'Newsletter subscriber removed successfully.'
            );
    }
}

