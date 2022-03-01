    <header class="max-w-xl mx-auto mt-20 text-center">

        <div class=" border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <p>By Cesar Molina</p>
            </div>

            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">

                <!--  STATUS -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">

                    <div x-data="{ show: false}" @click.away="show = false">
                        <button
                            @click="show = ! show"
                            class="py-2 pl-3 pr-9 text-sm font-semibold w-32 inline-left inline-flex"
                            >

                            Name

                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                         height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
                        </button>

                        <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl z-50" style="display: none">
                            @foreach ($games as $game)
                                <a href="/?search={{$game->slug}}" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white"
                                            >{{$game->name}}
                                </a>
                            @endforeach


                        </div>
                    </div>
                    |
                    <div clas="relative flex lg:inline-flex items-center bg-gray-100 rounted-xl px-3 py-2">
                        <form method="GET" action="/">
                            @if (request('author'))
                                <input type="hidden" name="autor" value="{{ request('author')}}">
                            @endif

                            <input type="text"
                                   name="search"
                                   placeholder="buscar"
                                   class="bg-transparent placeholder-black font-semibold text-sm"
                                   value="{{ request('search')}}" title="nombre o slug">
                        </form>
                    </div>

                    </div>
                    </div>
        </header>
