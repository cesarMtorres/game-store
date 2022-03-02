<x-layout>

    <x-setting :heading="'Edit Game: ' . $game->name">
        <form method="POST" action="/admin/games/{{ $game->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- component input name-->
                    <x-form.input name="name" :value="old('name', $game->name)" /> <!-- old es para la validaciones y game->name para editar-->

                <!-- component input textarea -->
                <x-form.textarea name="description">{{ old('description', $game->description)}}</x-form.textarea>


                <!-- component input url -->
                <x-form.input name="url" :value="old('url', $game->url)"/>
                <div class="flex mt-6">
                    <div class="flex1">
                        <x-form.input name="file" type="file" :value="old('thumbnail', $game->thumbnail)"/>
                    </div>
                    <img src="{{ asset('storage/' . $game->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
                </div>
                    <div class="mb-6">
                        <x-form.label name="state"/>

                            <select name="state" id="state">
                                <option
                                    value="ONLINE" {{$game->state ?? 'selected'}}
                                >
                                ONLINE
                                </option>
                                <option
                                value="OFFLINE"
                                >OFFLINE
                                </option>
                            </select>
                            <x-form.error name="state" />
                    </div>


                <x-submit>Update</x-submit>


            </form>

    </x-setting>

</x-layout>

