@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @unless(count($tags) == 0)
    @foreach ($tags as $tag)
    <x-tag-card :tag="$tag" />
    @endforeach

    @else
    <h2>
        no tags found
    </h2>
    @endunless
    <div class="mt-6 p-4 ">
        {{$tags->links()}}
    </div>
</div>
@endsection