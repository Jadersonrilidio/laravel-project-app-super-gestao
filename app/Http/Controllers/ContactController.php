<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContact;
use App\Models\ReasonContact;

class ContactController extends Controller
{
    /**
     * 
     */
    public function contact(Request $request)
    {   
        return view('site.contact', [
            'title'           => 'Super Manager - Contact',
            'page'            => 'contact',
            'request_method'  => $request->method(),
            'reasons_contact' => ReasonContact::all()
        ]);
    }

    /**
     * 
     */
    public function post_contact(Request $request)
    {
        // Validate all inputs
        $request->validate(array(
            'name'              => 'required|min:3|max:128',
            'phone'             => 'required',
            'email'             => 'email',
            'reason_contact_id' => 'required',
            'message'           => 'required|max:2000'
        ));

        SiteContact::create($request->all());

        return view('site.contact', array(
            'title'           => 'Super Manager - Contact',
            'page'            => 'contact',
            'request_method'  => $request->method(),
            'reasons_contact' => ReasonContact::all()
        ));
    }

    /**
     * MOCK METHOD FOR LEARNING PURPOSES
     */
    public function parameters(string $name, int $category_id, string $subject = 'none')
    {
        // ASSOCIATIVE ARRAY METHOD
        return view('site.contact', array(
            'name'        => $name,
            'category_id' => $category_id,
            'subject'     => $subject
        ));

        // COMPACT METHOD
        return view('site.contact', compact('name', 'category_id', 'subject'));

        // WITH METHOD
        return view('site.contact')->with('name', $name)->with('category_id', $category_id)->with('subject', $subject);
    }
}
