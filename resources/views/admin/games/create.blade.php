<x-layout>

    <x-setting heading="Publish New Game">
          <form method="POST" action="/admin/games" enctype="multipart/form-data">
                @csrf

                <!-- component input name-->
                <x-form.input name="name"/>

                <!-- component input textarea -->
                <x-form.textarea name="description"/>


                <!-- component input url -->
                <x-form.input name="url"/>
                <x-form.input name="thumbnail" type="file" required/>

                    <div class="mb-6">
                        <x-form.label name="state"/>

                            <select name="state" id="state">
                                <option value="ONLINE">ONLINE</option>
                                <option value="OFFLINE">OFFLINE</option>
                            </select>
                            <x-form.error name="state" />
                    </div>


                <x-submit>Register</x-submit>


            </form>

    </x-setting>

</x-layout>
