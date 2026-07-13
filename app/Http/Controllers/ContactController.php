<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Handle the contact form submission.
     *
     * @param  \App\Http\Requests\ContactRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(ContactRequest $request)
    {
        return redirect()
            ->route('contact')
            ->with('success', 'Thank you for reaching out. We will get back to you soon.');
    }
}
