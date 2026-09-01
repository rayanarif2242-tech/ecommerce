<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsletterSubscriberController extends Controller
{
    /**
     * Display newsletter subscribers.
     */
    public function index()
    {
        $subscribers = NewsletterSubscriber::latest()->get();

        return view(
            'admin.newsletter.index',
            compact('subscribers')
        );
    }


    /**
     * Add newsletter subscriber.
     */
    public function store(Request $request)
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
     * Show edit newsletter subscriber form.
     */
    public function edit($subscriber_id)
    {
        $subscriber = NewsletterSubscriber::where(
            'subscriber_id',
            $subscriber_id
        )->firstOrFail();

        return view(
            'admin.newsletter.edit',
            compact('subscriber')
        );
    }


    /**
     * Update newsletter subscriber.
     */
    public function update(Request $request, $subscriber_id)
    {
        $subscriber = NewsletterSubscriber::where(
            'subscriber_id',
            $subscriber_id
        )->firstOrFail();

        $request->validate([
            'email' => 'required|email|max:255|unique:newsletter_subscribers,email,' . $subscriber->id,

            'status' => 'required|in:Active,Inactive',
        ]);

        $subscriber->email = $request->email;

        $subscriber->status = $request->status;

        $subscriber->save();

        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'Newsletter subscriber updated successfully.'
            );
    }


    /**
     * Toggle subscriber status.
     */
    public function toggleStatus($subscriber_id)
    {
        $subscriber = NewsletterSubscriber::where(
            'subscriber_id',
            $subscriber_id
        )->firstOrFail();

        $subscriber->status =
            $subscriber->status === 'Active'
                ? 'Inactive'
                : 'Active';

        $subscriber->save();

        return back()->with(
            'success',
            'Subscriber status updated successfully.'
        );
    }


    /**
     * Remove newsletter subscriber.
     */
    public function destroy($subscriber_id)
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
