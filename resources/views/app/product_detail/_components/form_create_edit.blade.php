{{ $slot }}

<form action="{{ isset($product_detail->id) ? route('product_detail.update', ['product_detail' => $product_detail->id]) : route('product_detail.store') }}" method="POST">

    @csrf
    @if(isset($product_detail->id))
        @method('PUT')
    @endif

    <select name="product_id" class="borda-preta">
        <option value="">-- Select a product by Id --</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}" {{ (($product_detail->product_id ?? old('product_id')) == $product->id) ? 'selected' : '' }}>{{ $product->id.' - '.$product->name }}</option>
        @endforeach
    </select>
    {{ ($errors->has('product_id')) ? $errors->first('product_id') : '' }}

    <input type="text" name="length" value="{{ $product_detail->length ?? old('length') ?? '' }}" class="borda-preta" placeholder="length">
    {{ ($errors->has('length')) ? $errors->first('length') : '' }}

    <input type="text" name="width" value="{{ $product_detail->width ?? old('width') ?? '' }}" class="borda-preta" placeholder="width">
    {{ ($errors->has('width')) ? $errors->first('width') : '' }}

    <input type="text" name="height" value="{{ $product_detail->height ?? old('height') ?? '' }}" class="borda-preta" placeholder="height">
    {{ ($errors->has('height')) ? $errors->first('height') : '' }}

    <select name="unit_id" class="borda-preta">
        <option value="">-- Select an option --</option>
        @foreach($units as $unit)
            <option value="{{ $unit->id }}" {{ (($product_detail->unit_id ?? old('unit_id')) == $unit->id) ? 'selected' : '' }}>{{ $unit->unit.' - '.$unit->description }}</option>
        @endforeach
    </select>
    {{ ($errors->has('unit_id')) ? $errors->first('unit_id') : '' }}

    <button type="submit" class="borda-preta">{{ isset($product_detail->id) ? 'Update' : 'Register' }}</button>

</form>