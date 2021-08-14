@extends('layouts.landing')
@section('content')

    <div class="text-center">
        <h3>{{__('Products')}}</h3>
        <hr class="w-50">
    </div>
    <div class="">
        <form class="row d-flex justify-content-center align-items-center" method="get">
            <div class=" col-md-4 form-group">
                <label for="t">{{__('Title')}}</label>
                <input id="t" class="form-control" type="text" name="t" value="{{request('t')}}">
            </div>
            <div class=" col-md-4 form-group">
                <label for="o">{{__('Sort')}}</label>
                <select  id="o" class="form-control" name="o">
                    <option value="">--{{__('Choose')}}--</option>
                    <option value="1" @if (request('o')== 1) selected @endif>{{__('H_price')}}</option>
                    <option value="2" @if (request('o')== 2) selected @endif>{{__('L_price')}}</option>
                    <option value="3" @if (request('o')== 3) selected @endif>{{__('Newest')}}</option>
                    <option value="4" @if (request('o')== 4) selected @endif>{{__('Oldest')}}</option>
                </select>
            </div>
            <div class="mx-2 ">
                <button type="submit" class="btn btn-primary">{{__('Search')}}</button>
            </div>
        </form>
    </div>
    <hr>

    <div class="row d-flex justify-content-center">
        @foreach ($products as $key => $product)
            <div class="col-md-3 product_box">
                <img class="my-2" src="{{asset($product->image ?? 'img/empty.jpg')}}" alt="{{$product->title}}">
                <div class="d-flex justify-content-between">
                    <h5>{{$product->title}}</h5>
                    <p>
                        @if ($product->discount)
                            <span class="text-danger price_removed">{{number_format($product->price)}}</span>
                        @endif
                        <span>{{number_format($product->pay)}}</span>
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="#">{{$product->shop->title ?? '-'}}</a>
                    <p class="text-left">{{__('$')}}</p>
                </div>
                <form class="text-center" method="post" action="{{route('cart.manage', $product->id)}}">

                    <div class="in-cart @unless ($cart_item = $product->isInCart()) hidden @endunless">
                        <button type="button" name="type" value="add" class="manage-cart btn btn-primary btn-sm">+</button>
                        <span class="cart-count"> {{$cart_item->count ?? 0}} </span>
                        <button type="button" name="type" value="minus" class="manage-cart btn btn-primary btn-sm">-</button>
                    </div>
                    <div class="not-in-cart @if ($product->isInCart()) hidden @endif">
                        <button type="button" name="type" value="add" class="manage-cart btn btn-primary btn-sm">{{__('Add to cart')}}</button>
                    </div>

                </form>
                <div class="alert alert-warning hidden mt-3">
                </div>

                <hr>
                <p>{{$product->description}}</p>
            </div>

        @endforeach

    </div>
    <div class="mt-3">
        {{$products->links()}}
    </div>

@endsection
