{{ $slot }}

<form action="{{ isset($order->id) ? route('order.update', ['order' => $order->id]) : route('order.store') }}" method="POST">

    @csrf
    @if(isset($order->id))
        @method('PUT')
    @endif

    <select name="client_id" class="borda-preta">
        <option value=""> -- Select a client -- </option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}" {{ ($order->client_id ?? old('client_id')) == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
        @endforeach
    </select>
    {{ $errors->has('client_id') ? $errors->first('client+id') : '' }}

    <button type="submit" class="borda-preta">{{ isset($order->id) ? 'Update' : 'Register' }}</button>

</form>
