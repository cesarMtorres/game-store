@props(['game'])
<article
                class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">
                    <div class="flex-1 lg:mr-8">
                        {{--TODO--}}
                        <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
                    </div>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 lg:mt-0">
                            <div class="space-x-2">
                                <a href="/games/{{ $game->id }}"
                                   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                   style="font-size: 10px">UPDATE</a>

                                    <form action="{{ route('games.destroy', $game->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                                               style="font-size: 10px">DELETE</button>
                                    </form>

                            </div>

                            <div class="mt-4">
                                <h1 class="text-3xl">
                                    {{--TODO--}}
                                    {{ $game->name }}
                                </h1>

                                <span class="mt-2 block text-gray-400 text-xs">
                                    Published <time>{{$game->created_at->diffForHumans()}}</time>
                                    </span>
                            </div>
                        </header>

                        <div class="text-sm mt-2">
                            <p>{{$game->slug}}</p>
                        </div>

                        <footer class="flex justify-between items-center mt-8">
                            <div class="flex items-center text-sm">
                                Created by:
                                <div class="ml-3">
                                    <h5 class="font-bold">
                                        <a href="/authors/{{$game->author->name}}">{{$game->author->name}} </a>
                                    </h5>

                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>
