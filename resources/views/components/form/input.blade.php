@props(['name','type' => 'text'])

                <div class="mb-6">
                <x-form.label name="{{ $name }}" />

                    <input class="border border-gray-400 p-2 w-full"
                           type="{{ $type }}"
                           name="{{ $name }}"
                           id="{{ $name }}"
                           {{ $attributes(['value' => old($name)]) }}
                           >

                       <!-- componente de errores-->
                    <x-form.error name="{{ $name }}" />
                </div>
