@extends('layout')
@section('content')

<x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Billing
        </h2>
        <p class="mb-4">Your purchase details</p>
    </header>
    {{-- of course real purchase should be POST method--}}
    <form action ='/purchasesuccess' method="GET">
        @csrf
        @foreach($books as $book)
        <div class="mb-6 flex items-center justify-between">
            <p class="text-lg mb-2">
                {{$book->name}}
            </p>
            <p class="text-lg mb-2">
                {{$book->price}}$
            </p>
        </div>
        @endforeach
        <div class="mb-6 flex items-center justify-between">
            <p class="text-lg mb-2">
                Shipping fee
            </p>
            
            <p class="text-lg mb-2">
                {{$shippingfee}}$
            </p>
        </div>
        
        <hr style="color: gray; border-top-width: 3px" class="rounded-sm">

        <div class="mb-6 flex items-center justify-between">
            <p class="text-lg mb-2">
                Total
            </p>
            
            <p class="text-lg mb-2">
                {{$total}}$
            </p>
        </div>

        <div class="mb-6">
            <label for="shippingaddress" class="inline-block text-m mb-2">
                Your Shipping Address <br>
                (Leave empty if it's the same as your account address)
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="shippingaddress"
                value="{{old('shippingaddress')}}"
            />
            @error('shippingaddress')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6 text-center">
            <button
                type="submit"
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Complete Purchase
            </button>
        </div>

    </form>

</x-card>

@endsection