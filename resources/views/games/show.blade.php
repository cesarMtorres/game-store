<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ asset('storage/'. $game->thumbnail) }}" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ $game->created_at->diffForHumans() }}</time>
                    </p>

                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back
                        </a>

                        <div class="space-x-2">
                            <a href="#"
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">Techniques</a>
                            <a href="#"
                                class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">Updates</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">

                        <iframe src="{{$game->url}}" class="gameFrame"></iframe>
                        <a href="/#gamesList" class="btn btn-outline-danger btnBack btn-block btn-lg">
                        </a>
                    </div>
                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $game->name}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        <p>{{$game->description}}</p>
                    </div>
                </div>
            </article>
        </main>
</section>


</x-layout>