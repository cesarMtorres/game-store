<x-layout>

    @include('_game-header')

    <section class="px-6 py-8">

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($games->count())
                <x-games-grid :games="$games" />
            @else
                <p clas="text-center">No hay Juegos, Vuelve luego</p>
            @endif
        </main>

    </section>

</x-layout>
