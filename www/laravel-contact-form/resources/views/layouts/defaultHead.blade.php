<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
         <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <style>
            html, body {
                /* background-color: #fff; */
                background: url({{ asset('images/BG_02.png') }});
                background-repeat: repeat repeat;
                color: #89685d;
                text-shadow: #f0ebe9 1px 1px 0, #f0ebe9 2px 2px 0, 
                 #f0ebe9 3px 3px 0, #f0ebe9 4px 4px 0, 
                 #f0ebe9 5px 5px 0;            
                font-family: 'Nunito', sans-serif;
                font-weight: 600;
                height: 100vh3
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #89685d;
                text-shadow: #f0ebe9 1px 1px 0, #f0ebe9 2px 2px 0, 
                 #f0ebe9 3px 3px 0, #f0ebe9 4px 4px 0, 
                 #f0ebe9 5px 5px 0;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            a {
                color: #caa37a;
            }
            a:hover {
                color: #caa37a;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>     
@section('navbar')
    <body>  
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li  class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                             </li>  
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/product/list') }}">all gifts list</a> </li>
                             <li class="nav-item">   <a class="nav-link" href="{{ url('/product/create') }}">make new gift</a></li>
                             <li class="nav-item">   <a class="nav-link" href="{{ url('/my/product/list') }}">my created gifts</a></li>  
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
@yield('content')
@show
