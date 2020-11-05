@extends('layouts.defaultHead')
@section('navbar')
    @parent
@endsection
@section('content')
           
    <div class="container mt-5">

        <p>Product name: {{$product->name}} </p>
        @if (isset($product->description))
            <p>Product description: {{$product->description}}</p>
        @endif
        <p>Seller name: {{$product->user->name}} </p>
        
    </div>
@endsection    
</body>

</html>