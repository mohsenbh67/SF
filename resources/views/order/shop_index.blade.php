<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>


            <hr class="w-100 my-2">





            <div class="my-3">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">{{__('Num')}}</th>
                            <th scope="col">{{__('User')}}</th>
                            <th scope="col">{{__('Products')}}</th>
                            <th scope="col">{{__('Count')}}</th>
                            <th scope="col">{{__('Pay')}} ({{__('$')}})</th>
                            <th scope="col">{{__('Created_at')}}</th>
                            <th scope="col">{{__('Time')}}</th>
                            {{-- <th scope="col" colspan="2" class="text-center">{{__('Actions')}}</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$item->cart->user->name ?? '-'}}</td>
                                <td>{{$item->product->title ?? '-'}}</td>
                                <td>{{$item->count}}</td>
                                <td>{{number_format($item->payable)}}</td>
                                <td>{{persianDate($item->created_at)}}</td>
                                <td>{{$item->created_at->format('H:i')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3" style="direction : ltr">
                {{$items->links()}}
            </div>


</x-app-layout>
