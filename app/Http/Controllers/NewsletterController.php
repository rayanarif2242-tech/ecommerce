<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Show Newsletter & Suggestions Page.
     */
    public function index()
    {
        return view('user.newsletter');
    }

    /**
     * Subscribe to newsletter.
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'max:255',
            ],
        ]);

        $existingSubscriber = NewsletterSubscriber::where(
            'email',
            $request->email
        )->first();

        /*
        |--------------------------------------------------------------------------
        | Existing Subscriber
        |--------------------------------------------------------------------------
        */

        if ($existingSubscriber) {

            // Re-subscribe an unsubscribed user
            if ($existingSubscriber->status === 'Unsubscribed') {

                $existingSubscriber->update([
                    'status' => 'Active',
                    'subscribed_at' => now(),
                ]);

                return back()->with(
                    'newsletter_success',
                    'Welcome back! You have been subscribed again.'
                );
            }

            // Already subscribed
            return back()->with(
                'newsletter_success',
                'This email is already subscribed.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | New Subscriber
        |--------------------------------------------------------------------------
        */

        NewsletterSubscriber::create([
            'email' => $request->email,
            'status' => 'Active',
            'subscribed_at' => now(),
        ]);

        return back()->with(
            'newsletter_success',
            'Thank you! You have successfully subscribed.'
        );
    }
}