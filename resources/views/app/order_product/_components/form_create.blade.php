{{ $slot }}

<form action="{{ route('order_product.store', ['order' => $order->id]) ?? '' }}" method="POST">

    @csrf

    <select name="product_id" class="borda-preta">
        <option value="">-- Select a Product to Add --</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>
    {{ ($errors->has('product_id')) ? $errors->first('product_id') : '' }}

    <input type="number" name="quantity" value="{{ old('quantity') ?? '' }}" class="borda-preta" placeholder="Quantity">
    {{ $errors->has('quantity') ? $errors->first('quantity') : '' }}

    <button type="submit" class="borda-preta">Add</button>

</form>