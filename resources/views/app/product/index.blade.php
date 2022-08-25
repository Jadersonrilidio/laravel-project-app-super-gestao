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

                <table width="70%" style="margin-left:auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Weight</th>
                            <th>Unit Id</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach($list as $product)
                        <tbody>
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ set_size($product->description) }}</td>
                                <td>{{ $product->weight }}</td>
                                <td>{{ $product->unit_id }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td><a href="">Update</a></td>
                                <td><a href="">Delete</a></td>
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