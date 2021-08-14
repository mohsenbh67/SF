@extends('layouts.landing')
@section('content')

    <div class="text-center">
        <h3>{{__('Shops')}}</h3>
        <hr class="w-50">
    </div>

    <div class="row d-flex justify-content-center">
        @foreach ($shops as $key => $shop)
            <div class="col-md-5 shop_box">
                <div class="">
                    <h4 class="text-primary">{{$shop->title}}</h4>
                    <hr>
                </div>
                <div class="">
                    <b>نام صاحب فروشگاه:</b>
                    <p>{{$shop->full_name}}</p>
                </div>
                <div class="mt-2">
                    <b>آدرس :</b>
                    {{$shop->address}}
                </div>
                <div class="mt-2">
                    <b> تلفن :</b>
                    {{$shop->phone}}
                </div>
                <div class=" mt-3 btn btn-primary">
                    <a href="{{route('shop.show', $shop->id)}}">صفحه فروشگاه</a>
                </div>

            </div>

        @endforeach

    </div>

    <div class="mt-3">
        {{$shops->links()}}
    </div>



@endsection
