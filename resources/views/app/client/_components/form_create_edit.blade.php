{{ $slot }}

<form action="{{ isset($client->id) ? route('client.update', ['client' => $client->id]) : route('client.store') }}" method="POST">

    @csrf
    @if(isset($client->id))
        @method('PUT')
    @endif

    <input type="text" name="name" value="{{ $client->name ?? old('name') ?? '' }}" class="borda-preta" placeholder="Name">
    {{ ($errors->has('name')) ? $errors->first('name') : '' }}

    <button type="submit" class="borda-preta">{{ isset($client->id) ? 'Update' : 'Register' }}</button>

</form>
