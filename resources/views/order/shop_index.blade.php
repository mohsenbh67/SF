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
                            <th scope="col">{{__('Status')}}</th>
                            <th scope="col" class="text-center">{{__('Status change')}}</th>
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
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-primary px-3 py-2"> {{__('Fresh order')}} </span>
                                    @elseif ($item->status == 2)
                                        <span class="badge badge-success px-3 py-2"> {{__('Delivered')}} </span>
                                    @else
                                        <span class="badge badge-danger px-3 py-2"> {{__('Rejected')}} </span>
                                    @endif
                                </td>
                                <td class="">
                                    <form class="flex" action="{{route('order.status', $item->id)}}" method="post">
                                        @csrf
                                        <select class="" name="status">
                                            <option value=""> ---</option>
                                            <option value="1"> --{{__('Fresh order')}}-- </option>
                                            <option value="2"> --{{__('Delivered')}}-- </option>
                                            <option value="3"> --{{__('Rejected')}}-- </option>
                                        </select>
                                        <x-jet-button class="mr-3">{{ __('Submit') }}</x-jet-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3" style="direction : ltr">
                {{$items->links()}}
            </div>


</x-app-layout>
