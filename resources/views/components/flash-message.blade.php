@if(session()->has('message'))
    <div x-data="{visible: true}"
        x-init="setTimeout(()=> visible = false, 3000)"
        x-show="visible"
        class="fixed top-0 bg-laravel text-white px-8 py-3" style="left: 40%">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif