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
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="">

                <br>

                <table width="70%" style="margin-left:auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>UF</th>
                            <th>Email</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach($list as $supplier)
                        <tbody>
                            <tr>
                                <td>{{ $supplier->id }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->uf }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->created_at }}</td>
                                <td>{{ $supplier->updated_at }}</td>
                                <td><a href="{{ route('app.supplier.update', $supplier->id) }}">Update</a></td>
                                <td><a href="{{ route('app.supplier.delete', $supplier->id) }}">Delete</a></td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

                {{ $list->appends($request)->links() }}
            
            </div>
        </div>
    </div>

@endsection