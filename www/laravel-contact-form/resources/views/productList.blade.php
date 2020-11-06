@extends('layouts.defaultHead')
@section('navbar')
    @parent
@endsection
@section('content') 
    <div class="container mt-5">
        @if (count($products) <= 0)
            <p>Products list is empty</p>
        @endif
        <ul>
        @foreach ($products as $product)
            <li>Product name: {{ $product->name }}</li>
            @if (isset($product->description))
                <li>Description: {{$product->description}}</li>
            @endif
            <li>Seller name: {{ $product->user->name }}</li> 
            <br/>   
        @endforeach    
        </ul>
    </div>
@endsection    
</body>

</html>