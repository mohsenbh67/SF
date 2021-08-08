<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{__('Home')}}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="{{asset('css/public.css')}}">

    </head>
    <body>
        <div class="container mt-2">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="{{url('/')}}">SF</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @unless (currentLandingPage()) active @endunless" href="{{url('/')}}">{{__('Home')}}</a>
                        </li>
                        <li class="nav-item @if (currentLandingPage() == 'products') active @endif">
                            <a class="nav-link" href="{{route('landing', 'products')}}">{{__('Products')}}</a>
                        </li>
                        <li class="nav-item @if (currentLandingPage() == 'shops') active @endif">
                            <a class="nav-link" href="{{route('landing', 'shops')}}"> {{__('Shops')}}</a>
                        </li>
                        <li class="nav-item @if (currentLandingPage() == 'cart') active @endif">
                            <a class="nav-link" href="{{route('landing', 'cart')}}"> {{__('Cart')}}
                                <span id="cart-count" class="cart_number">
                                     @if (cartCount())
                                         {{cartCount()}}
                                     @else 0
                                     @endif
                                 </span>
                            </a>
                        </li>
                        <li class="nav-item" id="Acc">
                            <a class="nav-link btn btn-primary text-white" href="{{route('login')}}"> {{__('Account')}}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="card mt-3">
                <div class="card-body">

                    @if ($error = session('error'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>{{$error}}</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    @endif
                    @if ($message = session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>{{$message}}</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    @endif

                    @yield('content')

            </div>

        </div>



        y<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="{{asset('js/public.js')}}" charset="utf-8"></script>
    </body>
</html>
