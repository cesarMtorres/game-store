@props(['games'])

<x-game-featured-card :game="$games[0]"/>

    @if ($games->count() > 1)

        <div class="lg:grid lg:grid-cols-6">
            @foreach ($games->skip(1) as $game)
                <x-game-card :game="$game" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
            @endforeach
        </div>
    @endif

