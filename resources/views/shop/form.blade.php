<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <form class="grid grid-cols-3 gap-4" action="{{$shop->id ? route('shop.update', $shop->id) : route('shop.store')}}" method="post">
        @csrf
        @if ($shop->id)
            @method('PUT')
        @endif

        <div class="">
            <x-jet-label for="title" value="{{ __('Title') }}" />
            <x-jet-input id="title" class="block mt-2 w-full" type="text" name="title" :value="$shop->title ?? old('title')" required autofocus />
        </div>

        <div class="">
            <x-jet-label for="first_name" value="{{ __('First_name') }}" />
            <x-jet-input id="first_name" class="block mt-2 w-full" type="text" name="first_name" :value="$shop->first_name ?? old('first_name')" required/>
        </div>

        <div class="">
            <x-jet-label for="last_name" value="{{ __('Last_name') }}" />
            <x-jet-input id="last_name" class="block mt-2 w-full" type="text" name="last_name" :value="$shop->last_name ?? old('last_name')" required/>
        </div>

        <div class="">
            <x-jet-label for="phone" value="{{ __('Phone') }}" />
            <x-jet-input id="phone" class="block mt-2 w-full" type="text" name="phone" :value="$shop->phone ?? old('phone')" required/>
        </div>

        @unless ($shop->id)

                    <div class="">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-2 w-full" type="text" name="email" :value="$shop->email ?? old('email')" required/>
                    </div>

                    <div class="">
                        <x-jet-label for="user_name" value="{{ __('User_name') }}" />
                        <x-jet-input id="user_name" class="block mt-2 w-full" type="text" name="user_name" :value="$shop->user_name ?? old('user_name')" required/>
                    </div>
        @endunless

        <div class="col-span-3">
            <x-jet-label for="address" value="{{ __('Address') }}" />
            <x-jet-input id="address" class="block mt-2 w-full" type="text" name="address" :value="$shop->address ?? old('address')"/>
        </div>

        <div class="col-span-3">
            <div class="flex justify-center">
                <x-jet-button class="mr-3">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
        </div>


    </form>


</x-app-layout>
