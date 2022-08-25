<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Title of the webpage
     * 
     * @var string
     */
    protected $title = 'Super Manager - Home';

    /**
     * Webpage name for backend purposes
     * 
     * @var string
     */
    protected $action_page = 'app.home';

    /**
     * 
     */
    public function index(Request $request)
    {
        return view('app.home', ['title' => $this->title]);
    }
}
