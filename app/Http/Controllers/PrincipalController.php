<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContact;
use App\Models\ReasonContact;

class PrincipalController extends Controller
{
    /**
     * 
     */
    public function principal(Request $request)
    {
        return view('site.principal', [
            'title'           => 'Super Manager - Principal',
            'page'            => 'index',
            'request_method'  => $request->method(),
            'reasons_contact' => ReasonContact::all()
        ]);
    }

    /**
     * 
     */
    public function post_principal(Request $request)
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

        return view('site.principal', [
            'title'           => 'Super Manager - Principal',
            'page'            => 'index',
            'request_method'  => $request->method(),
            'reasons_contact' => ReasonContact::all()
        ]);
    }
}
