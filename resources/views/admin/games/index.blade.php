<x-layout>

    <x-setting heading="Manage Game">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($games as $game)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="/games/{{$game->slug}}">
                                                             {{$game->name}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{$game->url}}" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Url</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="/admin/games/{{$game->id}}/edit" class="text-blue-500 hover:text-blue-500">Edit</a>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="/admin/games/{{ $game->id}}"
                                                                    x-data="{conf: false, check: false}"
                                                                    @submit.prevent="if(conf == false) return;$el.submit()">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        class="text-gray-500"
                                                        @click="check = confirm('are you sure want delete: {{$game->name}}?'); conf = check;"
                                                        type="submit"
                                                        >Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach($games)
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>

</x-layout>

