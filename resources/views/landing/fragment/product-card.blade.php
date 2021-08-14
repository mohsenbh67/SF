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
