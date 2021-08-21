<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders detail') }}
        </h2>
    </x-slot>

    <div class="flex justify-end">
        <a href="{{route('order.index')}}" class="mb-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            {{__('Back')}}
        </a>
    </div>


    @include('landing.fragment.cart-table', ['cart' => $order, 'operations' => false])




</x-app-layout>
