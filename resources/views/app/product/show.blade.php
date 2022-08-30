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

                <table border="1" width="30%" style="text-align:left; margin-left:auto; margin-right:auto">
                        <tr>
                            <td>Id</td>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>{{ $product->weight }}</td>
                        </tr>
                        <tr>
                            <td>Unit_id</td>
                            <td>{{ $product->unit_id }}</td>
                        </tr>
                        <tr>
                            <td>Created_at</td>
                            <td>{{ $product->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated_at</td>
                            <td>{{ $product->updated_at }}</td>
                        </tr>
                </table>

            </div>
        </div>
    </div>

@endsection