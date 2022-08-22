<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>
</head>
<body>

    <h3>Suppliers (view)</h3>

    {{-- Comentario que sera descartado pelo interpretador do blade --}}
    
    @{{ Imprime isso count($suppliers) }}

    @php
        //  para comentarios de uma linha
        /* 
            para comentarios de multiplas linhas
            para comentarios de multiplas linhas
        */
    @endphp

    @isset($suppliers)

        @if(count($suppliers) > 0 && count($suppliers) <= 10)
            <h3>Existem alguns fornecedores cadastrados</h3>
        @elseif(count($suppliers) > 10)
            <h3>Existem varios fornecedores cadastrados</h3>
        @else
            <h3>Ainda nao existem fornecedores cadastrados</h3>
        @endif

        @unless($suppliers == 5)
            <h3>suppliers equals 5</h3>
        @endunless

        @empty($suppliers)
            <h3>array vazio</h3>
        @endempty

        @switch(count($supliers))
            @case(0)
                <h3>is 0!</h3>
                @break
            @case(1)
                <h3>is 1!</h3>
                @break
            @default
                <h3>is different!</h3>
        @endswitch

        @for($i=0; $i<10; $i++)
            {{ $i }} <br>
        @endfor

        {{ $i = 0 }}
        @php $i = 0 @endphp

        @while($suppliers[$i])
            <h3>is true!</h3> <br>
            {{ $if++ }}
        @endwhile

        @foreach($suppliers as $supplier)
            Total de registros - {{ $loop->count }}
            <br>
            Iteracao atual - {{ $loop->iteration }}
            <br>
            @if($loop->first)
                Primeira iteracao do loop
            @endif
            <br>
            @if($loop->last)
                Ultima iteracao do loop
            @endif
            <br>
            <h3>$supplier</h3>
        @endforeach

        @forelse($suppliers)
            Total de registros - {{ $loop->count }}
            <br>
            Iteracao atual - {{ $loop->iteration }}
            <br>
            @if($loop->first)
                Primeira iteracao do loop
            @endif
            <br>
            <h3>smth happens</h3>
        @empty
            <h3>Nao existem fornecedores cadastrados!</h3>
        @endforelse

        @dd($loop)

    @endisset

    @php
    /*
        // REVIEW BLADE SYNTAX 

        $loop->iteration
        $loop->count
        $loop->first
        $loop->last

        {{ analogue to <?php ?> for blade syntax }}
        {{-- comments using blade syntax --}}
        @{{ print as plain text }}

        @switch()   @case()    @break      @default        @endswitch
        @if()       @elseif()  @else       @endif
        @unless()   @endunless
        
        @while()        @endwhile
        @for()          @endfor
        @foreach()      @endforeach
        @forelse()      @endforelse
        
        @empty()        @endempty
        @isset()        @endisset
        
        @php            @endphp

    */
    @endphp

</body>
</html>