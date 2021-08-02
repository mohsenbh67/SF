@extends('layouts.landing')
@section('content')

    <div class="my-3">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">{{__('Num')}}</th>
                    <th scope="col">{{__('Products')}}</th>
                    <th scope="col">{{__('Count')}}</th>
                    <th scope="col">{{__('Price')}}</th>
                </tr>
            </thead>
                @foreach ($cart->items as $key => $item)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->product->title ?? '-'}}</td>
                        <td>{{$item->count}}</td>
                        <td>{{number_format($item->payable)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th class="text-center" colspan="3">{{__('Total price')}}</th>
                        <th>{{number_format($cart->sum)}} {{__('$')}}</th>
                    </tr>
            </tbody>
        </table>
    </div>

@endsection
