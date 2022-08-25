<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Unit;

class ProductController extends Controller
{
    /**
     * Title of the webpage
     * 
     * @var string
     */
    protected $title = 'Product';

    /**
     * Webpage name for backend purposes
     * 
     * @var string
     */
    protected $action_page = 'product.index';

    /**
     * POST create form rules
     * 
     * @var array
     */
    protected $rules = array(
        'name'        => 'required|min:3|max:40',
        'description' => 'required|max:1000',
        'weight'      => 'required|integer',
        'unit_id'     => 'exists:units,id',
    );

    /**
     * POST create form feedback for rules
     * 
     * @var array
     */
    protected $feedback = array(
        'name.min'       => "The :attribute must have between 3 and 40 characters",
        'name.max'       => "The :attribute must have between 3 and 40 characters",
        'decription.max' => "The :attribute must have less than 2000 characters",
        'weight.integer' => "The :attribute must be a integer number",
        'unit_id.exists' => "invalid unit",
        'required'       => "Field :attribute is required",
    );

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Product::paginate(5);

        return view('app.product.index', [
            'title' => $this->title . ' - List',
            'list'  => $list,
            'request'  => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.product.create', [
            'title' => $this->title . ' - Create',
            'units' => Unit::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules, $this->feedback);

        Product::create($request->all());

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return 'Yes show!';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return 'Yes edit!';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        return 'Yes update!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return 'Yes destroy!';
    }
}
