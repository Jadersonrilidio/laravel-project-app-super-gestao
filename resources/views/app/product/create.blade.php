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

                @if (isset($request_method) and $request_method == 'POST')
                    <p>New product registered successfuly</p>
                @endif

                <form action="{{ route('product.store') }}" method="POST">

                    @csrf

                    <input type="text" name="name" value="{{ old('name') ?? '' }}" class="borda-preta" placeholder="Name">
                    {{ ($errors->has('name')) ? $errors->first('name') : '' }}

                    <textarea name="description" class="borda-preta">{{ old('description') ?? 'write a description' }}</textarea>
                    {{ ($errors->has('description')) ? $errors->first('description') : '' }}
                    
                    <input type="text" name="weight" value="{{ old('weight') ?? '' }}" class="borda-preta" placeholder="Weight">
                    {{ ($errors->has('weight')) ? $errors->first('weight') : '' }}
                    
                    <select name="unit_id" class="borda-preta">
                        <option value="">-- Select an option --</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}" {{ ($unit->id == old('unit_id')) ? 'selected' : '' }}>{{ $unit->unit.' - '.$unit->description }}</option>
                        @endforeach
                    </select>
                    {{ ($errors->has('unit_id')) ? $errors->first('unit_id') : '' }}

                    <button type="submit" class="borda-preta">Register</button>
                </form>
            </div>
        </div>
    </div>

@endsection