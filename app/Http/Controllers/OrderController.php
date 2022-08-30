<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * 
     */
    protected $rules = [
        'client_id' => 'required|exists:clients,id',
    ];

    /**
     * 
     */
    protected $feedback = [
        'client_id.required' => 'The field client id is required',
        'client_id.exists' => 'The client does not exist',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Order List';
        $list = Order::paginate(10);

        return view('app.order.index', [
            'title'   => $title,
            'list'    => $list,
            'request' => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Client';
        $clients = Client::all('id', 'name');

        return view('app.order.create', [
            'title'   => $title,
            'clients' => $clients,
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

        Order::create($request->all());

        $title = 'Create Client';
        $clients = Client::all('id', 'name');
        $message = 'New order placed successfuly!';

        return view('app.order.create', [
            'title'   => $title,
            'clients' => $clients,
            'message' => $message,
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
