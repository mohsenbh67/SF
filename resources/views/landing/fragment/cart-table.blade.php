<table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">{{__('Num')}}</th>
            <th scope="col">{{__('Products')}}</th>
            <th scope="col">{{__('Shops')}}</th>
            <th scope="col">{{__('Count')}}</th>
            <th scope="col">{{__('Price')}}</th>
            @if ($operations)
                <th scope="col">{{__('Actions')}}</th>
            @endif
        </tr>
    </thead>
        @foreach ($cart->items as $key => $item)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$item->product->title ?? '-'}}</td>
                <td>{{$item->product->shop->title ?? '-'}}</td>
                <td>
                    @if ($operations)
                        <form class="text-center" method="post" action="{{route('cart.manage',$item->product->id)}}">

                            <div class="in-cart @unless ($cart_item = $item->product->isInCart()) hidden @endunless">
                                <button type="button" name="type" value="add" class="manage-cart btn btn-primary btn-sm">+</button>
                                <span class="cart-count"> {{$cart_item->count ?? 0}} </span>
                                <button type="button" name="type" value="minus" class="manage-cart btn btn-primary btn-sm">-</button>
                            </div>
                            <div class="not-in-cart @if ($item->product->isInCart()) hidden @endif">
                                <button type="button" name="type" value="add" class="manage-cart btn btn-primary btn-sm">{{__('Add to cart')}}</button>
                            </div>

                        </form>
                        {{-- <form method="post" action="{{route('cart.manage', $item->product_id)}}">
                            @csrf
                            <button type="submit" name="type" value="add" class="btn btn-primary btn-sm">+</button>
                            {{$item->count}}
                            <button type="submit" name="type" value="minus" class="btn btn-primary btn-sm">-</button>
                        </form> --}}
                        @else
                            {{$item->count}}
                    @endif
                </td>
                <td class="td" data-id="{{$item->product->id}}">{{number_format($item->payable)}}</td>
                @if ($operations)
                    <td>
                        <form method="post" action="{{route('cart.remove', $item->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="type" value="add" class="btn btn-danger btn-sm">{{__('Delete')}}</button>
                        </form>
                    </td>
                @endif

            </tr>
            @endforeach
            <tr>
                <th class="text-center"  colspan="4">{{__('Total price')}}  ({{__('$')}})</th>
                <th id="sum" colspan="2">{{number_format($cart->sum)}}</th>
            </tr>
    </tbody>
</table>
