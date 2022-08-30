<div class="topo">

    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('client.index') }}">Client</a></li>
            <li><a href="{{ route('order.index') }}">Order</a></li>
            <li><a href="{{ route('app.supplier.index') }}">Supplier</a></li>
            <li><a href="{{ route('product.index') }}">Product</a></li>
            <li><a href="{{ route('app.logout') }}">Logout</a></li>
        </ul>
    </div>
</div>