@extends('app.layouts.basic')

@section('title', 'Super Manager - ' . $title)

@section('content')

    @include('app.layouts._partials.top')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-adm">
            <p>{{ $title }}</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('order.create') }}">Create</a></li>
                <li><a href="{{ route('order.index') }}">List</a></li>
            </ul>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="">

                <br>

                <table style="margin-left:auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Client</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Add Products</th>
                        </tr>
                    </thead>
                    @foreach($list as $order)
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->client->name }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td><a href="{{ route('order_product.create', ['order' => $order->id]) }}">Add Products</a></td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

                {{ $list->appends($request)->links() }}
            
            </div>
        </div>
    </div>

@endsection