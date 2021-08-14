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

            @include('landing.fragment.product-card')

        @endforeach

    </div>
    <div class="mt-3">
        {{$products->links()}}
    </div>

@endsection
