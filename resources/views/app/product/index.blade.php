@extends('app.layouts.basic')

@section('title', $title)

@section('content')

    @include('app.layouts._partials.top')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-adm">
            <p>{{ $title }}</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.create') }}">Create</a></li>
                <li><a href="{{ route('product.index') }}">List</a></li>
            </ul>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="">

                <br>

                <table border="1" style="margin-left:auto; margin-right:auto">
                    
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Supplier</th>
                            <th>Weight</th>
                            <th>Unit Id</th>
                            <th>Length</th>
                            <th>Width</th>
                            <th>Height</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Visualize</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th>Details</th>
                        </tr>
                    </thead>

                    @foreach($list as $product)
                        <tbody>

                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ set_size($product->description) }}</td>
                                <td>{{ $product->supplier->name }}</td>
                                <td>{{ $product->weight }}</td>
                                <td>{{ $product->unit_id }}</td>
                                <td>{{ $product->productDetail->length ?? '' }}</td>
                                <td>{{ $product->productDetail->width ?? '' }}</td>
                                <td>{{ $product->productDetail->height ?? '' }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td><a href="{{ route('product.show', ['product' => $product->id]) }}">Visualize</a></td>
                                <td><a href="{{ route('product.edit', ['product' => $product->id]) }}">Update</a></td>
                                <td>
                                    <form id="del_form_{{ $product->id }}" action="{{ route('product.destroy', ['product' => $product->id])}}", method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('del_form_{{ $product->id }}').submit()">Delete</a>
                                    </form>
                                </td>
                                <td><a href="#">Details</a></td>
                            </tr>

                            <tr>
                                <td colspan="15">
                                    <p style="text-align:center">
                                        Orders:
                                        @foreach($product->orders as $order)
                                            <a href="{{ route('order_product.create', ['order' => $order->id]) }}">{{ $order->id }},</a>
                                        @endforeach
                                    </p>
                                </td>
                            </tr>
                            
                        </tbody>
                    @endforeach

                </table>

                {{ $list->appends($request)->links() }}
            
            </div>
        </div>
    </div>

@endsection

@php
    function set_size(string $str)
    {
        return substr($str, 0, 41) . ' ...';
    }
@endphp