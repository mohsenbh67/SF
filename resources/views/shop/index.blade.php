<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="flex justify-end">
        <a href="{{route('shop.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            {{__('Add new Shop')}}
        </a>
    </div>

        @if ($shops->count())
            <hr class="w-100 my-2">

            <div class="my-3">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">{{__('Num')}}</th>
                            <th scope="col">{{__('Title')}}</th>
                            <th scope="col">{{__('First_name')}} و {{__('Last_name')}} </th>
                            <th scope="col">{{__('Phone')}}</th>
                            <th scope="col">{{__('Created_at')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shops as $key => $shop)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$shop->title}}</td>
                                <td>{{$shop->full_name}}</td>
                                <td>{{$shop->phone}}</td>
                                <td>{{persianDate($shop->created_at)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

</x-app-layout>
