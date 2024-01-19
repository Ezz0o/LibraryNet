@props(['tag'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/tags/{{$tag->id}}">{{$tag->name}}</a>
            </h3>
        </div>
    </div>
</x-card>
