<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>


            <hr class="w-100 my-2">




            @if ($orders->count())

            <div class="my-3">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">{{__('Num')}}</th>
                            <th scope="col">{{__('User')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th scope="col">{{__('Code')}}</th>
                            <th scope="col">{{__('Created_at')}}</th>
                            <th scope="col" colspan="2" class="text-center">{{__('Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$order->user->name}}</td>
                                <td>
                                    @if ($order->finished)
                                        <span class="text-green-600"> پرداخت شده </span>
                                        @else
                                            <span class="text-red-600"> پرداخت نشده </span>
                                    @endif
                                </td>
                                <td>{{$order->code ?? '-'}}</td>
                                <td>{{persianDate($order->created_at)}}</td>
                                <td>
                                    <a href="{{route('order.show', $order->id)}}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 active:bg-green-600 focus:outline-none focus:border-green-600 focus:ring focus:ring-green-200 disabled:opacity-25 transition">
                                        {{__('Detail')}}
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="deleteshop-btn inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-400 active:bg-orange-600 focus:outline-none focus:border-orange-600 focus:ring focus:ring-orange-200 disabled:opacity-25 transition">
                                        {{__('Delete')}}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3" style="direction : ltr">
                {{$orders->links()}}
            </div>

        @endif

</x-app-layout>
