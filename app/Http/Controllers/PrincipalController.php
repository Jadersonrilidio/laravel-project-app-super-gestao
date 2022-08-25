<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContact;
use App\Models\ReasonContact;

class PrincipalController extends Controller
{
    /**
     * Title of the webpage
     * 
     * @var string
     */
    protected $title = 'Super Manager - Principal';

    /**
     * Webpage name for backend purposes
     * 
     * @var string
     */
    protected $action_page = 'site.index';

    /**
     * 
     */
    public function principal(Request $request)
    {
        return view('site.principal', [
            'title'           => $this->title,
            'action_page'     => $this->action_page,
            'request_method'  => $request->method(),
            'reasons_contact' => ReasonContact::all()
        ]);
    }

    /**
     * 
     */
    public function post_principal(Request $request)
    {
        $request->validate([
            'name'              => 'required|min:3|max:128',
            'phone'             => 'required',
            'email'             => 'email',
            'reason_contact_id' => 'required',
            'message'           => 'required|max:2000'
        ],
        [
            'name.required' => "Field 'name' is required",
            'name.min'      => "Field 'name' must have between 03 and 64 characters",
            'name.max'      => "Field 'name' must have between 03 and 64 characters",
            'required'      => "Field :attribute cannot be empty"
        ]);

        SiteContact::create($request->all());

        return view('site.principal', [
            'title'           => $this->title,
            'action_page'     => $this->action_page,
            'request_method'  => $request->method(),
            'reasons_contact' => ReasonContact::all()
        ]);
    }
}
