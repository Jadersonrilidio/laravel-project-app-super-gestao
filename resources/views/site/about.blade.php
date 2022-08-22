@extends('site.layouts.basic')

@section('title', $title ?? 'Super Manager')

@section('content')

    @include('site.layouts._partials.top')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Hi there, I'm the super manager system!</h1>
        </div>

        <div class="informacao-pagina">
            <p>Super manager is the online administrative control system that can transform and enhance your company's business.</p>
            <p>Developed with the latest technology for you to take care of what is most important, your business!</p>
        </div>  
    </div>

    @include('site.layouts._partials.foot')

@endsection
