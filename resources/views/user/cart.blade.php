@extends('layout')
@section('content')
<x-card class="p-10">
    <header class="flex justify-between items-center">
        <h1
            class="text-3xl text-left font-bold my-6 uppercase"
        >
            Manage Cart
        </h1>
        <div class="">
            <i class="fa-solid fa-credit-card text-green-700"></i>
            <a href="/cart/purchase" class="text-lg text-left text-green-700 font-bold my-6"> Order Purchase</a>
        </div>
    </header>

    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless($books->isEmpty())
            @foreach($books as $book)
            <tr class="border-gray-300">
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a href="/book/{{$book->id}}">
                        {{$book->name}}
                    </a>
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    {{$book->price}}$
                    
                </td>
                @if(auth()->user()->elevation == 1)
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a
                        href="/book/{{$book->id}}/edit"
                        class="text-blue-400 px-6 py-2 rounded-xl"
                        ><i
                            class="fa-solid fa-pen-to-square"
                        ></i>
                        Edit</a
                    >
                </td>
                @endif
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <form method="POST" action="/cart/{{$book->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">
                            <i
                                class="fa-solid fa-trash-can"
                            ></i>
                            Remove from cart
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    No Books in cart yet
                </td>
            </tr>
            @endunless
        </tbody>
    </table>
</x-card>
@endsection