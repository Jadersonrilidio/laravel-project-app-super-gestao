@extends('app.layouts.basic')

@section('title', 'Super Manager - ' . $title)

@section('content')

    @include('app.layouts._partials.top')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-adm">
            <p>{{ $title }}</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('client.create') }}">Create</a></li>
                <li><a href="{{ route('client.index') }}">List</a></li>
            </ul>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="">

                <br>

                <table style="margin-left:auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Visualize</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach($list as $client)
                        <tbody>
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->created_at }}</td>
                                <td>{{ $client->updated_at }}</td>
                                <td><a href="{{ route('client.show', ['client' => $client->id]) }}">Visualize</a></td>
                                <td><a href="{{ route('client.edit', ['client' => $client->id]) }}">Update</a></td>
                                <td>
                                    <form id="del_form_{{ $client->id }}" action="{{ route('client.destroy', ['client' => $client->id])}}", method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('del_form_{{ $client->id }}').submit()">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

                {{ $list->appends($request)->links() }}
            
            </div>
        </div>
    </div>

@endsection