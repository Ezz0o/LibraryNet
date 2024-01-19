@props(['book'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/books/{{$book->id}}">{{$book->name}}</a>
            </h3>
            <div class="text-m font-italic mb-4">Author: {{$book->author}}</div>
            <x-book-tag-holder :tagsCsv="$book->tags" />
            <div class="text-m mt-4"> 
                Date of publishing: {{$book->dateofpublishing}}
            </div>
        </div>
        <div class="ml-auto">
            Price: {{$book->price}}$
            <form action="/cart/{{$book->id}}" method="POST" class="ml-auto mt-24">
                @csrf
                <i class="fa-solid text-green-500 fa-shopping-cart"></i>
                <input type="submit" class="text-green-500 cursor-pointer" value="Add to cart"/>
            </form>
        </div>
    </div>
</x-card>
