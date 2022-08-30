<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\Product;
use App\Models\Unit;

class ProductDetailController extends Controller
{
    /**
     * Title of the webpage
     * 
     * @var string
     */
    protected $title = 'Product Detail';

    /**
     * POST create form rules
     * 
     * @var array
     */
    protected $rules = array(
        'product_id'  => 'exists:products,id',
        'length'      => 'required|integer',
        'width'       => 'required|integer',
        'height'      => 'required|integer',
        'unit_id'     => 'exists:units,id',
    );

    /**
     * POST create form feedback for rules
     * 
     * @var array
     */
    protected $feedback = array(
        'product_id.exists' => "Invalid product Id",
        'unit_id.exists'    => "invalid unit",
        'required'          => "Field :attribute is required",
        'integer'           => "The :attribute value must be an integer",
    );

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $title = $this->title . ' - Index';
        $message = 'Product Details';

        return view('app.product_detail.index', [
            'title'   => $title,
            'message' => $message,
        ]);

        // TODO - a search menu for product_details items
        // $units = Unit::all();
        // $products = Product::all(['id', 'name']);

        // return view('app.product_details.search', [
        //     'title'    => $title,
        //     'units'    => $units,
        //     'products' => $products,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $title = $this->title . ' - Create';
        $units = Unit::all();
        $products = Product::all(['id', 'name']);

        return view('app.product_detail.create', [
            'title'    => $title,
            'units'    => $units,
            'products' => $products,
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

        ProductDetail::create($request->all());

        $title = $this->title . ' - Create';
        $units = Unit::all();
        $products = Product::all(['id', 'name']);
        $message = 'Product details created!';

        return view('app.product_detail.create', [
            'title'    => $title,
            'units'    => $units,
            'products' => $products,
            'message'  => $message,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\ProductDetail  $product_detail
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDetail $product_detail)
    {
        $title = 'Product ID ' . $product_detail->product_id . ' Details';

        return view('app.product_detail.show', [
            'title'    => $title,
            'product_detail' => $product_detail,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ProductDetail  $product_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetail $product_detail)
    {
        $title = 'Edit Product ID ' . $product_detail->product_id . ' Details';
        $units = Unit::all();
        $products = Product::all('id', 'name');
        
        return view('app.product_detail.edit', [
            'title'    => $title,
            'product_detail' => $product_detail,
            'units' => $units,
            'products' => $products,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\ProductDetail  $product_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDetail $product_detail)
    {
        $request->validate($this->rules, $this->feedback);

        $product_detail->update($request->all());

        $title = 'Edit Product ID ' . $product_detail->product_id . ' Details';
        $units = Unit::all();
        $products = Product::all('id', 'name');
        $message = 'Product details successfuly updated!';

        return view('app.product_detail.edit', [
            'title'    => $title,
            'product_detail' => $product_detail,
            'units' => $units,
            'products' => $products,
            'message' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\ProductDetail $product_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDetail $product_detail)
    {
        //
    }
}
