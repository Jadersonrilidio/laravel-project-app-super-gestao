@extends('app.layouts.basic')

@section('title', $title)

@section('content')

    @include('app.layouts._partials.top')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-adm">
            <p>{{ $title }} </p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('order.index') }}">Return</a></li>
            </ul>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="" style="width:30%; margin-left:auto; margin-right:auto;">

                <h4>Order Details</h4>

                <p>Client: {{ $order->client->name }}</p>
                <p>Order ID: {{ $order->id }}</p>

                <h4>Poducts List: </h4>
                <div class="">
                    <table border="1" style="margin-left:auto; margin-right:auto;">
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Insertion Date</th>
                                <th>Remove products</th>
                            </tr>
                        </thead>
            
                        <tbody>
                            @foreach($order->products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->quantity ?? '' }}</td>
                                    <td>{{ $product->pivot->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <form id="del_form_{{$product->pivot->id}}" action="{{ route('order_product.destroy', ['order_product' => $product->pivot->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="document.getElementById('del_form_{{$product->pivot->id}}').submit()">Remove</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <span>{{ $message ?? '' }}</span>

                @component('app.order_product._components.form_create', [
                    'products' => $products,
                    'order'    => $order,
                ])
                @endcomponent

            </div>
        </div>
    </div>

@endsection