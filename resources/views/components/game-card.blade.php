@props(['game'])
                <article
                    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl
                    ']) }}>
                    <div class="py-6 px-5">
                        <div>
                            <img src="{{ asset('storage/'. $game->thumbnail) }}"  class="rounded-xl">
                        </div>

                        <div class="mt-8 flex flex-col justify-between">
                            <header>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 lg:mt-0">
                            <div class="space-x-2">
                                <x-state-button :game="$game" />
                            </div>

                                <div class="mt-4">
                                    <h1 class="text-3xl">
                                        {{$game->name}}
                                    </h1>

                                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{$game->created_at->diffForHumans()}}</time>
                                    </span>
                                </div>
                            </header>

                            <div class="text-sm mt-4">
                                <p>{{$game->description}}</p>
                            </div>

                            <footer class="flex justify-between items-center mt-8">
                                <div class="flex items-center text-sm">
                                    <p>Create by:</p>
                                    <div class="ml-3">
                                    <h5 class="font-bold">
                                        <a href="/authors/{{$game->author->name}}">{{$game->author->name}}</a>
                                    </h5>
                                    </div>
                                </div>

                                <div>
                                    <a href="/games/{{$game->slug }}"
                                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                                       >Ver</a>
                                </div>
                            </footer>
                        </div>
                    </div>
                </article>

