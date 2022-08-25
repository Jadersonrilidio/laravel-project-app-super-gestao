<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Title of the webpage
     * 
     * @var string
     */
    protected $title = 'Supplier';
    
    /**
     * Webpage name for backend purposes
     * 
     * @var string
     */
    protected $action_page = 'app.supplier.index';

    /**
     * POST login form rules
     * 
     * @var array
     */
    protected $rules = array(
        'name'  => 'required|min:3|max:64',
        'uf'    => 'required|min:2|max:2',
        'email' => 'required|email|max:128'
    );

    /**
     * POST login form feedback for rules
     * 
     * @var array
     */
    protected $feedback = array(
        'name.min'     => "The :attribute must have between 3 and 64 characters",
        'name.max'     => "The :attribute must have between 3 and 64 characters",
        'uf.min'       => "The :attribute must have 2 characters",
        'uf.max'       => "The :attribute must have 2 characters",
        'email.email'  => "The :attribute is invalid",
        'email.max'    => "The :attribute must be no longer than 128 characters",
        'required'     => "Field :attribute is required",
    );

    /**
     * 
     */
    public function index()
    {
        return view('app.supplier.index', ['title' => $this->title]);
    }

    /**
     * 
     */
    public function create(Request $request)
    {   
        if($request->method() == 'POST' and $request->input('_token') != '') {
            $request->validate($this->rules, $this->feedback);
            Supplier::create($request->all());
        }

        return view('app.supplier.create', [
            'title'          => $this->title  . " - Create",
            'request_method' => $request->method(),
        ]);
    }

    /**
     * 
     */
    public function list(Request $request)
    {
        $params = array(
            'name'  => $request->input('name') ?? '',
            'uf'    => $request->input('uf') ?? '',
            'email' => $request->input('email') ?? ''
        );

        $list = new Supplier();
        
        foreach($params as $param => $value)
            if($value != '')
                $list = $list->where($param, 'like', '%'.$value.'%');
        
        $list = $list->paginate(5);

        return view('app.supplier.list', [
            'title'   => $this->title . ' - List',
            'list'    => $list,
            'request' => $request->all(),
        ]);
    }

    /**
     * 
     */
    public function update($id, Request $request)
    {
        $supplier = Supplier::find($id);

        if($request->method() == 'POST' and $request->input('_token') != '' and $request->input('id') != '') {
            $request->validate($this->rules, $this->feedback);
            $supplier = Supplier::find($request->input('id'));
            $supplier->update($request->all());
        }

        return view('app.supplier.update', [
            'title'          => $this->title . ' - Update',
            'request_method' => $request->method(),
            'supplier'       => $supplier,
        ]);
    }

    /**
     * 
     */
    public function delete($id, $name='', $uf='', $email='', Request $request)
    {   
        Supplier::find($id)->delete();

        return redirect()->route('app.supplier.index');
        // TODO - recall after delete to the same list parameters at the same page and with updated after delete list
    }
}
