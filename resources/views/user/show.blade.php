@extends('layout')
@section('content')
<x-card class="p-10 max-w-lg mx-auto mt-24">

    <div>
        <div class="mb-6">
            <label for="firstname" class="inline-block text-lg mb-2">
                First Name
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="firstname"
                value="{{$user->firstname}}"
                disabled
            />
            @error('firstname')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="lastname" class="inline-block text-lg mb-2">
                Last Name
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="lastname"
                value="{{$user->lastname}}"
                disabled
            />
            @error('lastname')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="phonenumber" class="inline-block text-lg mb-2">
                Phone Number
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="phonenumber"
                value="{{$user->phonenumber}}"
                disabled
            />
            @error('phonenumber')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="address" class="inline-block text-lg mb-2">
                Address
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="address"
                value="{{$user->address}}"
                disabled
            />
            @error('address')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Email</label
            >
            <input
                type="email"
                class="border border-gray-200 rounded p-2 w-full"
                name="email"
                value="{{$user->email}}"
                disabled
            />
            @error('email')
                <p class=" text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <form method="POST" action="/users/{{$user->id}}" class="float-right">
            @csrf
            @method('DELETE')
            <button class="text-red-600">
                <i
                    class="fa-solid fa-trash-can"
                ></i>
                Remove user
            </button>
        </form>
    </div>
</x-card>
@endsection