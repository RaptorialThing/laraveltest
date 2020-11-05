@extends('layouts.defaultHead')
@section('navbar')
    @parent
@endsection

@section('content')          
    <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        @if (isset($success))
            <p> {{$success}} </p>
        @endif    
    </div>
@endsection    
</body>

</html>