@extends('layout')
@section('content')
@include('partials._search')

{{--This view is used specifically for searching for books--}}
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @unless(count($books) == 0)
            @foreach ($books as $book)
                <x-book-card :book="$book" />
            @endforeach
            @else
                <h2>
                    no books match your search result
                </h2>
            @endunless
    <div class="mt-6 p-4 ">
        {{$books->links()}}
    </div>
</div>
@endsection
