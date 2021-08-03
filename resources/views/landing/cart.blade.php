@extends('layouts.landing')
@section('content')

    <div class="my-3">
        @if ($cart)
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{__('Num')}}</th>
                        <th scope="col">{{__('Products')}}</th>
                        <th scope="col">{{__('Shops')}}</th>
                        <th scope="col">{{__('Count')}}</th>
                        <th scope="col">{{__('Price')}}</th>
                        <th scope="col">{{__('Actions')}}</th>
                    </tr>
                </thead>
                    @foreach ($cart->items as $key => $item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$item->product->title ?? '-'}}</td>
                            <td>{{$item->product->shop->title ?? '-'}}</td>
                            <td>
                                <form method="post" action="{{route('cart.manage', $item->product_id)}}">
                                    @csrf
                                    <button type="submit" name="type" value="add" class="btn btn-primary btn-sm">+</button>
                                    {{$item->count}}
                                    <button type="submit" name="type" value="minus" class="btn btn-primary btn-sm">-</button>
                                </form>
                            </td>
                            <td>{{number_format($item->payable)}}</td>
                            <td>
                                <form method="post" action="{{route('cart.remove', $item->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="type" value="add" class="btn btn-danger btn-sm">{{__('Delete')}}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <th class="text-center"  colspan="4">{{__('Total price')}}</th>
                            <th colspan="2">{{number_format($cart->sum)}} {{__('$')}}</th>
                        </tr>
                </tbody>
            </table>
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
