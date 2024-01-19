@extends('layout')
@section('content')
<x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Register
        </h2>
        <p class="mb-4">Create an account to use LibraryNet</p>
    </header>

    <form method="POST" action="/register">
        @csrf
        <div class="mb-6">
            <label for="firstname" class="inline-block text-lg mb-2">
                First Name
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="firstname"
                value="{{old('firstname')}}"
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
                value="{{old('lastname')}}"
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
                value="{{old('phonenumber')}}"
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
                value="{{old('address')}}"
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
                value="{{old('email')}}"

            />
            @error('email')
                <p class=" text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="password"
                class="inline-block text-lg mb-2"
            >
                Password
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password"
                value="{{old('password')}}"
            />
            @error('password')
                <p class=" text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="password_confirmation"
                class="inline-block text-lg mb-2"
            >
                Confirm Password
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password_confirmation"
                value="{{old('password_confrimation')}}"
            />
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Sign Up
            </button>
        </div>

        <div class="mt-8">
            <p>
                Already have an account?
                <a href="/login" class="text-laravel"
                    >Login</a
                >
            </p>
        </div>
    </form>
</x-card>
@endsection