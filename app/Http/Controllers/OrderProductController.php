<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Order;

class OrderProductController extends Controller
{
    /**
     * 
     */
    protected $rules = [
        'product_id' => 'exists:products,id',
        'order_id'   => 'exists:orders,id',
        'quantity'   => 'required|integer',
    ];

    /**
     * 
     */
    protected $feedback = [
        'quantity.integer' => 'Quantity field must be an integer number',
        'required'         => 'The field :attribute is required',
        'exists'           => 'The informed :attribute does not exists',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $title = 'Add Products to Order No ' . $order->id;
        $products = Product::all('id', 'name');

        # ALTERNATIVE eager loading                                                             
        $order->products;

        return view('app.order_product.create', [
            'title'          => $title,
            'products'       => $products,
            'order'          => $order,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $request->validate($this->rules, $this->feedback);

        $order->products()->attach(
            $request->get('product_id'),
            [
                'quantity' => $request->get('quantity')
            ]
        );

        // # ALTERNATIVE for many products at once                                              
        // $order->products()->attach([
        //     $request->get('product_id') => ['quantity' => $request->get('quantity')]
        // ]);

        // OrderProduct::create([
        //     'order_id'   => $order->id,
        //     'product_id' => $request->get('product_id'),
        //     'quantity'   => $request->get('quantity'),
        // ]);

        return redirect()->route('order_product.create', ['order' => $order->id]);

        // $title = 'Add Products to Order No ' . $order->id;
        // $products = Product::all('id', 'name');
        // $message = 'Product added!';

        // return view('app.order_product.create', [
        //     'title'    => $title,
        //     'products' => $products,
        //     'order'    => $order,
        //     'message'   => $message,
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Order $order
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProduct $order_product)
    {
        $order_id = $order_product->order_id;
        
        $order_product->delete();

        // $order->products()->detach($product->id);

        // OrderProduct::where([
        //     'order_id'   => $order->id,
        //     'product_id' => $product->id
        // ])->delete();

        return redirect()->route('order_product.create', ['order' => $order_id]);
    }
}
