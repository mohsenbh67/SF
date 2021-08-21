<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>...</td>
                                <td>
                                    @if ($order->finished)
                                        <span class="text-green-600"> پرداخت شده </span>
                                        @else
                                            <span class="text-red-600"> پرداخت نشده </span>
                                    @endif
                                </td>
                                <td>{{$order->code ?? '-'}}</td>
                                <td>{{persianDate($order->created_at)}}</td>
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
