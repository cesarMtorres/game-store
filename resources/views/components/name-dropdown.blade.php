<x-dropdown>

    <x-slot name="trigger">
        <button class="py2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentName) ? ucwords($currentName) : 'Name' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style=""></x-icon>
        </button>


    </x-slot>

    <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>


    @foreach ($games as $game)
        <x-dropdown-item
            href="/?name={{$game->name}}"
            :active="request('name') === $game->slug"

            >

            {{$game->name}}
        </x-dropdown-item>
    @endforeach


</x-dropdown>
