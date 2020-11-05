@extends('layouts.defaultHead')
@section('navbar')
    @parent
@endsection
@section('content') 
    <div class="container mt-5">
        @if (count($products) <= 0)
            <p>Products list is empty</p>
        @endif
        <p>Products by {{Auth::user()->name}}</p>
        <ul>
        @foreach ($products as $product)
            <li>Product name: {{ $product->name }}</li>
            @if (isset($product->description))
                <li>Description: {{$product->description}}</li>
            @endif
            <li><a href="/product/{{$product->id}}/update">Edit product</a></li>
            <li><a id="deleteProductBtn" onclick="deleteProduct();" style="color:#c87d2f;" href="#">Delete product</a></li>
            <br/>   
        @endforeach    
        </ul>
    </div>
@endsection    
@if (count($products) > 0)
    <script type="text/javascript">
        function deleteProduct() {
        res = prompt('Do you want delete this product? Really?','Click cancel and go back, dude');
        if (res)  {
            elem = document.getElementById('deleteProductBtn');
            elem.setAttribute('href','/product/{{$product->id}}/delete');
        }
        }
    </script>    
@endif
</body>

</html>