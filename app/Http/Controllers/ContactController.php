<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContact;
use App\Models\ReasonContact;

class ContactController extends Controller
{
    /**
     * Title of the webpage
     * 
     * @var string
     */
    protected $title = 'Super Manager - Contact';

    /**
     * Webpage name for backend purposes
     * 
     * @var string
     */
    protected $action_page = 'site.contact';

    /**
     * 
     */
    public function contact(Request $request)
    {
        return view('site.contact', [
            'title'           => $this->title,
            'action_page'     => $this->action_page,
            'request_method'  => $request->method(),
            'reasons_contact' => ReasonContact::all()
        ]);
    }

    /**
     * 
     */
    public function post_contact(Request $request)
    {
        $request->validate([
            'name'              => 'required|min:3|max:64',
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

        return view('site.contact', [
            'title'           => $this->title,
            'action_page'     => $this->action_page,
            'request_method'  => $request->method(),
            'reasons_contact' => ReasonContact::all()
        ]);
    }

    // /**
    //  * MOCK METHOD FOR LEARNING PURPOSES
    //  */
    // public function parameters(string $name, int $category_id, string $subject = 'none')
    // {
    //     // ASSOCIATIVE ARRAY METHOD
    //     return view('site.contact', array(
    //         'name'        => $name,
    //         'category_id' => $category_id,
    //         'subject'     => $subject
    //     ));

    //     // COMPACT METHOD
    //     return view('site.contact', compact('name', 'category_id', 'subject'));

    //     // WITH METHOD
    //     return view('site.contact')->with('name', $name)->with('category_id', $category_id)->with('subject', $subject);
    // }
}
