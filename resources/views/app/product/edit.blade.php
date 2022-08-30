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
                <li><a href="{{ route('product.create') }}">Create</a></li>
                <li><a href="{{ route('product.index') }}">List</a></li>
            </ul>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="" style="width:30%; margin-left:auto; margin-right:auto;">

                <span>{{ $message ?? '' }}</span>

                @component('app.product._components.form_create_edit', [
                    'product'   => $product,
                    'units'     => $units,
                    'suppliers' => $suppliers,
                ])

                @endcomponent

            </div>
        </div>
    </div>

@endsection