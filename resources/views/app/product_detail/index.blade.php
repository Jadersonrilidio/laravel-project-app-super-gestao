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
                <li><a href="{{ route('product_detail.create') }}">Create</a></li>
                <li><a href="{{ route('product_detail.index') }}">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="" style="width:30%; margin-left:auto; margin-right:auto;">

                <br><br><br><br><br><br><br><span style="font-size:4em; color:blue">{{ $message ?? '' }}</span>

            </div>
        </div>
    </div>

@endsection