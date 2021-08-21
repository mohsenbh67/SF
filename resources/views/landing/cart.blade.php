@extends('layouts.landing')
@section('content')

    <div class="my-3">
        @if ($cart_item)

            @include('landing.fragment.cart-table', ['operations' => true])

            <div class="text-center">
                <form class="" action="{{route('cart.finish')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">{{__('Accept and pay')}}</button>
                </form>
            </div>
            @else
                <div class="alert alert-info">
                    <p>{{__('Cart is empty')}}</p>
                </div>
        @endif
    </div>

@endsection
