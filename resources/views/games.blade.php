<x-layout>

        @include('_game-header')
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($games->count())
                <x-games-grid :games="$games"/>
            @else
                <p class="text-center">No Games yet. check back later</p>
           @endif
        </main>
   {{--
   -                <div class="lg:grid lg:grid-cols-3">
   -                    <x-game-card/>
   -                    <x-game-card/>
   -                    <x-game-card/>
   -            </div>
   -
   --}}
</x-layout>
