@extends('layout')
@section('content')
<x-card class="p-10">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Manage Users
        </h1>
    </header>
    <div class="lg:grid lg:grid-cols-3 lg:gap-10">
        {{--users table--}}
        <div>
            <header for="usertable"
            class="text-2xl text-center font-bold my-6 uppercase"
            
            >Users </header>
            <p class="text-m text-center font-bold my-2">Click on user to edit</p>
            <table class="w-full table-auto rounded-sm" name="usertable">
                <tbody>
                    @unless($managementData['users']->isEmpty())
                    @foreach($managementData['users'] as $user)
                    <tr class="border-gray-300">
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="/users/{{$user->id}}">
                                {{$user->firstname}} {{$user->lastname}}
                            </a>
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <form method="POST" action="/users/{{$user->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">
                                    <i
                                        class="fa-solid fa-trash-can"
                                    ></i>
                                    Remove user
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            No users registered to the website yet
                        </td>
                    </tr>
                    @endunless
                </tbody>
            </table>
        </div>
        {{--books table--}}
        <div>
            <header for="booktable"
            class="text-2xl text-center font-bold my-6 uppercase"
            
            >Books </header>
            <p class="text-m text-center font-bold my-2">Click on book to edit</p>

            <table class="w-full table-auto rounded-sm" name="booktable">
                <tbody>
                    @unless($managementData['books']->isEmpty())
                    @foreach($managementData['books'] as $book)
                    <tr class="border-gray-300">
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="/books/{{$book->id}}">
                                {{$book->name}}
                            </a>
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <form method="POST" action="/books/{{$book->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">
                                    <i
                                        class="fa-solid fa-trash-can"
                                    ></i>
                                    Remove book
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr class="border-gray-300">
                        <td class="px-4 py-4 border-gray-300 text-lg">
                            <i class="fa-solid fa-plus text-green-700"></i>
                            <a href="/book/create" class="text-green-700">
                            Add Book
                            </a>
                        </td>

                    </tr>
                    @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            No books to show yet
                        </td>
                    </tr>
                    @endunless
                </tbody>
            </table>
        </div>
        {{--tags table--}}
        <div>
            <header for="tagtable"
            class="text-2xl text-center font-bold my-6 uppercase"
            
            >tags </header>
            <p class="text-m text-center font-bold my-2">Click on tag to browse</p>
            <table class="w-full table-auto rounded-sm" name="tagtable">
                <tbody>
                    @unless($managementData['tags']->isEmpty())
                    @foreach($managementData['tags'] as $tag)
                    <tr class="border-gray-300">
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="/tags/edit/{{$tag->id}}">
                                {{$tag->name}}
                            </a>
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <form method="POST" action="/tags/{{$tag->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">
                                    <i
                                        class="fa-solid fa-trash-can"
                                    ></i>
                                    Remove Tag
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr class="border-gray-300">
                        <td class=" px-4 py-8 border-t border-b border-gray-300 text-lg">
                            No Tags to show yet
                        </td>
                    </tr>
                    @endunless
                </tbody>
            </table>
            <div>
                <form action="/tags" method="POST" class="flex items-center">
                @csrf
                    <input type="text"
                    class="border border-gray-200 rounded p-2 mt-2 mr-2 w-3/4 "
                    name="name"
                    placeholder="tag name"
                    >
                    <div>
                        <i class="fa-solid fa-plus text-green-700"> </i> 
                        <button type="submit" class="text-green-700">Add Tag </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-card>
@endsection