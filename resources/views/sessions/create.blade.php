<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 bg-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In</h1>

            <form method="POST" action="/login" class="mt-10">
                @csrf

                <x-form.input name="email" type="email"/>
                <x-form.input name="password" type="password"/>


                <div class="mb-6">
                    <x-submit>Log In</x-button>
                </div>
                @if($errors->any())
                    <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-red-500 text-xs">{{$error}}</li>
                    @endforeach
                    </ul>
                @endif
            </form>

        </main>
    </section>
</x-layout>


