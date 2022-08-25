@extends('site.layouts.basic')

@section('title', $title ?? 'Super Manager')

@section('content')

    @include('site.layouts._partials.top')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">

            <span>{{ $error }}</span>

            <div style="width:40%; margin-left:auto; margin-right:auto">
                @component('site.layouts._components.form_login', [
                    'action_page' => $action_page,
                ])
                @endcomponent
            </div>
        </div>  
    </div>

    @include('site.layouts._partials.foot')
    
@endsection