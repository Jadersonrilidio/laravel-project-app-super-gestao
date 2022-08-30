{{ $slot }}

<form action="{{ isset($product->id) ? route('product.update', ['product' => $product->id]) : route('product.store') }}" method="POST">

    @csrf
    @if(isset($product->id))
        @method('PUT')
    @endif

    <input type="text" name="name" value="{{ $product->name ?? old('name') ?? '' }}" class="borda-preta" placeholder="Name">
    {{ ($errors->has('name')) ? $errors->first('name') : '' }}

    <textarea name="description" class="borda-preta">{{ $product->description ?? old('description') ?? 'write a description' }}</textarea>
    {{ ($errors->has('description')) ? $errors->first('description') : '' }}


    <select name="supplier_id" class="borda-preta">
        <option value="">-- Select a supplier --</option>
        @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}" {{ ($product->supplier_id ?? old('supplier_id') == $supplier->id) ? 'selected' : '' }}>{{ $supplier->name }}</option>
        @endforeach
    </select>
    {{ ($errors->has('supplier_id')) ? $errors->first('supplier_id') : '' }}


    <input type="text" name="weight" value="{{ $product->weight ?? old('weight') ?? '' }}" class="borda-preta" placeholder="Weight">
    {{ ($errors->has('weight')) ? $errors->first('weight') : '' }}
    
    <select name="unit_id" class="borda-preta">
        <option value="">-- Select an unit --</option>
        @foreach($units as $unit)
            <option value="{{ $unit->id }}" {{ ($product->unit_id ?? old('unit_id') == $unit->id) ? 'selected' : '' }}>{{ $unit->unit . ' - ' . $unit->description }}</option>
        @endforeach
    </select>
    {{ ($errors->has('unit_id')) ? $errors->first('unit_id') : '' }}

    <button type="submit" class="borda-preta">{{ isset($product->id) ? 'Update' : 'Register' }}</button>

</form>