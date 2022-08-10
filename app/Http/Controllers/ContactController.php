<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * 
     */
    public function contact() {
        return view('site.contact');
    }

    /**
     * 
     */
    public function parameters(string $name, int $category_id, string $subject = NULL) {
        // TODO - create new features on page
        return view('site.contact');
    }
}
