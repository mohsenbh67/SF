<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <form class="grid grid-cols-4 gap-4" enctype="multipart/form-data" action="{{$product->id ? route('product.update', $product->id) : route('product.store')}}" method="post">
        @csrf
        @if ($product->id)
            @method('PUT')
        @endif


        <div class="">
            <x-jet-label for="title" value="{{ __('Title') }}" />
            <x-jet-input id="title" class="block mt-2 w-full" type="text" name="title" :value="$product->title ?? old('title')" required autofocus />
        </div>
        <div class="">
            <x-jet-label for="price" value="{{ __('Price') }}" />
            <x-jet-input id="price" class="block mt-2 w-full" type="text" name="price" :value="$product->price ?? old('price')" required/>
        </div>
        <div class="">
            <x-jet-label for="discount" value="{{ __('Discount') }}" />
            <x-jet-input id="discount" class="block mt-2 w-full" type="text" name="discount" :value="$product->discount ?? old('discount')" />
        </div>
        <div class="">
            <x-jet-label for="image" value="{{ __('Image') }}" />
            <input id="image" class="block mt-3 w-full" type="file" name="image" :value="$product->image ?? old('image')" >
        </div>
        <div class="col-span-4">
            <x-jet-label for="description" value="{{ __('Description') }}" />
            <x-jet-input id="description" class="block mt-2 w-full" type="text" name="description" :value="$product->description ?? old('description')" />
        </div>

        <div class="col-span-4">
            <div class="flex justify-center">
                <x-jet-button class="mr-3">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
        </div>


    </form>


</x-app-layout>
