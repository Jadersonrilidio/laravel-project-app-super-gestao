<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        $suppliers = array(
            'supplier 1'
        );

        return view('app.suppliers.index', compact('suppliers'));
    }
}
