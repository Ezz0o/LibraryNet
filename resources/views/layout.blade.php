<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>        
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>LibraryNet | books to your doorstep </title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center">
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="/"
                        ><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo"
                    /></a>
                </li>
                @auth
                <li class="mt-auto mb-auto">
                    <span class="font-bold uppercase">
                        Welcome {{auth()->user()->firstname}}
                    </span>
                </li>
                @endauth
            </ul>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                @if(auth()->user()->elevation == 1)
                <li>
                    <a href="/panel" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Website</a
                    >
                </li>
                @endif
                <li>
                    <a href="/cart" class="hover:text-laravel"
                        ><i class="fa-solid fa-shopping-cart"></i>
                        Cart</a
                    >
                </li>
                <li>
                    <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>
    <main>
        {{-- VIEW OUTPUT --}}
        @yield('content')
    </main>
    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
>
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    
</footer>

<x-flash-message />

</body>
</html>
