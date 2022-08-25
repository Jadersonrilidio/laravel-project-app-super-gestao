@extends('site.layouts.basic')

@section('title', $title)

@section('content')

    @include('site.layouts._partials.top')

    <div class="conteudo-destaque">
    
        <div class="esquerda">
            <div class="informacoes">
                <h1>Super Manager System</h1>
                <p>The ideal entepreuneur management software for your business.<p>
                <div class="chamada">
                    <img src="{{ asset('/img/check.png') }}">
                    <span class="texto-branco">Easy and complete management</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('/img/check.png') }}">
                    <span class="texto-branco">Your company on the clouds</span>
                </div>
            </div>

            <div class="video">
                <img src="{{ asset('/img/player_video.jpg') }}">
            </div>
        </div>

        <div class="direita">
            <div class="contato">
                <h1>Contact</h1>
                <p>In any case of doubt, please contact our team by fulfilling the form below.<p>
                
                @component('site.layouts._components.form_contact', [
                    'class' => 'borda-branca',
                    'action_page' => $action_page,
                    'reasons_contact' => $reasons_contact
                ])
                    @if($request_method == 'POST')
                        <p style="color:green">Form successfully sent! Please kindly wait for our reply, thanks for contacting us! - Ass: Super manager team</p>
                    @endif
                @endcomponent

            </div>
        </div>
    </div>

    @include('site.layouts._partials.foot')

@endsection