<!doctype html>

<title>Promarketing</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="//unpkg.com/alpinejs" defer></script>
<style>
    html {
        scroll-behavior: smooth;
    }


</style>
<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="{{ asset('images/Logo-promarketing.jpeg') }}"  width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <span class="text-xs font-bold uppercase">{{ auth()->user()->username }}</span>

                    <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">
                        @csrf

                        <button type="submit">Log Out</button>
                    </form>

                <a href="/admin/games" class="ml-4 bg-blue-500 text-white uppercase font-semibold py-2 px-10 rounded-2xl hover:bg-blue-600">Dashboard</a>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-3 text-xs font-bold uppercase">Log In</a>
                @endauth

            </div>

        </nav>

        {{ $slot }}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <a href="mailto:cesar.molina.torres.05@gmailcom" class="bg-blue-600 text-white">Cesar Molina</a>
            <p class="text-sm mt-3">Make with love  </p>
            </footer>
    </section>
    <x-flash/> <!--  MUESTRA UN MENJAJE SI SE REGISTRO EL USES-->
    </body>
