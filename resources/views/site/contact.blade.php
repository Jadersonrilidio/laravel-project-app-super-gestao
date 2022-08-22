@extends('site.layouts.basic')

@section('title', $title ?? 'Super Manager')

@section('content')

    @include('site.layouts._partials.top')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Get in touch with us</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">

                @component('site.layouts._components.form_contact', [
                    'class' => 'borda-preta',
                    'page' => $page,
                    'reasons_contact' => $reasons_contact
                ])
                    @if($request_method == 'POST')
                        <p>Form successfully sent! Please kindly wait for our reply</p>
                        <p>Thanks for contacting us! - Ass: Super manager team</p>
                    @endif
                @endcomponent

            </div>
        </div>  
    </div>

    @include('site.layouts._partials.foot')
    
@endsection
