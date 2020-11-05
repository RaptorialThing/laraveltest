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

        <form action="" onsubmit="return checkFillable();" method="post" action="{{ route('contact.store') }}">

            <!-- CROSS Site Request Forgery Protection -->
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input id="name" type="text" class="form-control" name="name" id="name">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea id="description" class="form-control" name="description" id="description" rows="4"></textarea>
            </div>
            <input  type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
@endsection        
    </div>
    <script type="text/javascript">
        function checkFillable() {
            el = document.getElementById('description');
            el2 = document.getElementById('name');

            if (!el.value) {
                alert('Add description to your product');
                return false;
            }
            if (!el2.value) {
                alert('Add name to your product');
                return false;
            }

            return true;
        }
    </script>   
</body>

</html>