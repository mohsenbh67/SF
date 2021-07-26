@extends('layouts.landing')
@section('content')

    <div class="row d-flex justify-content-center">
        @foreach ($products as $key => $product)
            <div class="col-md-3 product_box">
                <img class="my-2" src="{{asset($product->image)}}" alt="{{$product->title}}">
                <div class="d-flex justify-content-between">
                    <h5>{{$product->title}}</h5>
                    <p>
                        @if ($product->discount)
                            <span class="text-danger price_removed">{{number_format($product->price)}}</span>
                        @endif
                        <span>{{number_format($product->pay)}}</span>
                    </p>
                </div>
                <p class="text-left">تومان</p>
                <hr>
                <p>{{$product->description}}</p>
            </div>

        @endforeach

    </div>

@endsection
