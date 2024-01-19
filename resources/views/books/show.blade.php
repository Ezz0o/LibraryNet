@extends('layout')
@section('content')
<x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit Book
        </h2>
    </header>

    <form method="POST" action="/books/{{$book->id}}">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">
                Name
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="name"
                value="{{$book->name}}"
            />
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="author" class="inline-block text-lg mb-2">
                Author
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="author"
                value="{{$book->author}}"
            />
            @error('author')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="dateofpublishing" class="inline-block text-lg mb-2">
                Date of publishings
            </label>
            <input
                type="date"
                class="border border-gray-200 rounded p-2 w-full"
                name="dateofpublishing"
                value="{{$book->dateofpublishing}}"
            />
            @error('dateofpublishing')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="price" class="inline-block text-lg mb-2">
                Price
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="price"
                value="{{$book->price}}"
            />
            @error('price')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
                Tags(comma seperated)
            </label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="tags"
                value="{{$book->tags}}"

            />
            @error('tags')
                <p class=" text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Edit
            </button>
        </div>
    </form>
</x-card>
@endsection