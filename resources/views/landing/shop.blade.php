@extends('layouts.landing')
@section('content')

    <div class="text-center">
        <h3>{{$shop->title}}</h3>
        <hr class="w-50">
    </div>

    <div class="row d-flex justify-content-center">
        @foreach ($products as $key => $product)

            @include('landing.fragment.product-card')

        @endforeach

    </div>
    <hr>
    <div class="">
        {{$products->links()}}
    </div>

@endsection
