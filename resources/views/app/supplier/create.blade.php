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
                <li><a href="{{ route('app.supplier.create') }}">Create</a></li>
                <li><a href="{{ route('app.supplier.index') }}">Search</a></li>
            </ul>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="" style="width:30%; margin-left:auto; margin-right:auto;">

                @if ($request_method == 'POST')
                    <p>New supplier registered successfuly</p>
                @endif

                <form action="{{ route('app.supplier.create') }}" method="POST">

                    @csrf

                    <input type="text" name="name" value="{{ old('name') ?? '' }}" class="borda-preta" placeholder="Name">
                    {{ ($errors->has('name')) ? $errors->first('name') : '' }}

                    <input type="text" name="uf" value="{{ old('uf') ?? '' }}" class="borda-preta" placeholder="UF">
                    {{ ($errors->has('uf')) ? $errors->first('uf') : '' }}
                    
                    <input type="text" name="email" value="{{ old('email') ?? '' }}" class="borda-preta" placeholder="Email">
                    {{ ($errors->has('email')) ? $errors->first('email') : '' }}
                    
                    <button type="submit" class="borda-preta">Register</button>
                </form>
            </div>
        </div>
    </div>

@endsection