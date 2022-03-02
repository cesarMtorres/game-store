@props(['heading'])


<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">

        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48">
            <ul>
                <li>
                    <a href="/admin/games" class="{{ request()->is('admin/games') ? 'text-blue-500' :  '' }}">All Games</a>
                </li>
                <li>
                    <a href="/admin/games/create" class="{{ request()->is('admin/games/create') ? 'text-blue-500' :  '' }}">New Game</a>
                </li>
            </ul>

        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>

        </main>
    </div>
</section>

