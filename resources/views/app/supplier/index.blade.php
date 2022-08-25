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
                <li><a href="{{ route('app.supplier.create') }}">Create</a></li>
                <li><a href="{{ route('app.supplier.index') }}">Search</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="" style="width:30%; margin-left:auto; margin-right:auto;">
                
                <form action="{{ route('app.supplier.list') }}" method="POST">

                    @csrf

                    <input type="text" name="name" class="borda-preta" placeholder="Name">

                    <input type="text" name="uf" class="borda-preta" placeholder="UF">

                    <input type="text" name="email" class="borda-preta" placeholder="Email">

                    <button type="submit" class="borda-preta">Search</button>
                </form>

            </div>
        </div>
    </div>

    {{-- @include('app.layouts._partials.foot') --}}

@endsection