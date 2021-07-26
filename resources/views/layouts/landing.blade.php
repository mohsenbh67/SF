<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{__('Home')}}</title>

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
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @unless (currentLandingPage()) active @endunless" href="{{url('/')}}">{{__('Home')}}</a>
                        </li>
                        <li class="nav-item @if (currentLandingPage() == 'products') active @endif">
                            <a class="nav-link" href="{{route('landing', 'products')}}">{{__('Products')}}</a>
                        </li>
                        <li class="nav-item @if (currentLandingPage() == 'shops') active @endif">
                            <a class="nav-link" href="{{route('landing', 'shops')}}"> {{__('Shops')}}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="card mt-3">
                <div class="card-body">

                    @yield('content')

            </div>

        </div>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="{{asset('js/public.js')}}" charset="utf-8"></script>
    </body>
</html>
