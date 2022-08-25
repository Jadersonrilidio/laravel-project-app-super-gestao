<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Title of the webpage
     * 
     * @var string
     */
    protected $title = 'Super Manager - Client';

    /**
     * 
     */
    public function index(Request $request)
    {
        return view('app.client', ['title' => $this->title]);
    }
}
