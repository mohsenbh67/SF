<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="flex justify-end">
        <a href="{{route('product.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            {{__('Add new Product')}}
        </a>
    </div>

        @if ($products->count())
            <hr class="w-100 my-2">

            @admin
            <div class="">
                <form class="flex justify-center items-center flex-wrap">
                    <div class="w-25 p-3">
                        <label class="block mb-3">{{__('Choose_shop')}}</label>
                        <select class="select2" name="S">
                            <option value="">--{{__('Choose')}}--</option>
                            @foreach ($shops as $shop)
                                <option value="{{$shop->id}}" @if (request('S') == $shop->id) selected @endif>{{$shop->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-25 p-3">
                        <x-jet-label for="T" value="{{__('Title')}}" />
                        <x-jet-input id="T" class="block mt-2 w-full" type="text" name="T" :value="request('T')"/>
                    </div>

                    <div class="w-25 p-3 center">
                        <x-jet-label for="sort" value="{{__('Sort')}}" />
                        <select class="" name="">
                            <option value="1">{{__('H_price')}}</option>
                            <option value="2">{{__('L_price')}}</option>
                            <option value="3">{{__('Newest')}}</option>
                            <option value="4">{{__('Oldest')}}</option>
                        </select>
                    </div>
                    <div class="w-25 p-3">
                        <label for="">
                            <input type="checkbox" name="Tr" value="1">
                            {{__('Show_deleted')}}
                        </label>

                    </div>

                    <div class="w-25 text-center">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-600 focus:outline-none focus:border-gray-600 focus:ring focus:ring-gray-200 disabled:opacity-25 transition">
                            {{__('Search')}}
                        </button>
                    </div>


                </form>
            </div>

            @endadmin



            <div class="my-3">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">{{__('Num')}}</th>
                            @admin
                            <th scope="col">{{__('Shops')}}</th>
                            @endadmin
                            <th scope="col">{{__('Title')}}</th>
                            <th scope="col">{{__('Price')}}</th>
                            <th scope="col">{{__('Discount')}}</th>
                            <th scope="col">{{__('Pay')}}</th>
                            <th scope="col">{{__('Image')}}</th>
                            <th scope="col">{{__('Created_at')}}</th>
                            <th scope="col" colspan="2" class="text-center">{{__('Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                @admin
                                <td>{{$product->shop->title ?? '-'}}</td>
                                @endadmin
                                <td>{{$product->title}}</td>
                                <td>{{number_format($product->price)}}</td>
                                <td>{{$product->discount ?? 0}}</td>
                                <td>{{$product->pay}}</td>
                                @if ($product->image)
                                    <td class="text-green-500">{{__('Have')}}</td>
                                @else
                                    <td class="text-red-500">{{__('Not_have')}}</td>
                                @endif
                                <td>{{persianDate($product->created_at)}}</td>
                                <td>
                                    <a href="{{route('product.edit', $product->id)}}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 active:bg-green-600 focus:outline-none focus:border-green-600 focus:ring focus:ring-green-200 disabled:opacity-25 transition">
                                        {{__('Edit')}}
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('product.destroy',$product->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="deleteshop-btn inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-400 active:bg-orange-600 focus:outline-none focus:border-orange-600 focus:ring focus:ring-orange-200 disabled:opacity-25 transition">
                                            {{__('Delete')}}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

</x-app-layout>
