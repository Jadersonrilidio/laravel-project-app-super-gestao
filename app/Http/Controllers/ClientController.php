<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Page document title
     * 
     * @var string
     */
    protected $title = 'Super Manager - Clients';

    /**
     * 
     */
    protected $rules = [
        'name' => 'required|min:3|max:64'
    ];

    /**
     * 
     */
    protected $feedback = [
        'name.required' => 'The name field is required',
        'name.min' => 'The name must have between 3 and 64 characters',
        'name.max' => 'The name must have between 3 and 64 characters',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Client::paginate(10);
        $title = 'Clients List';

        return view('app.client.index', [
            'title' => $title,
            'list'  => $list,
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

        return view('app.client.create', [
            'title' => $title,
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

        Client::create($request->all());

        $title = 'Create Client';
        $message = 'New Client successfuly created!';

        return view('app.client.create', [
            'title' => $title,
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
