<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //creamos un admin
        $user = User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);

        // obtenemos el los datos json
        $json = Storage::get('/data.json');
        $data = json_decode($json);

        foreach ($data->data as $item){
            Game::create(array(
                'name' => $item->name,
                'user_id' => $user->id,
                'state' => 'ONLINE',
                'thumbnail' => $item->thumbnail,
                'url' => $item->url,
                'description'  => $item->description,
            ));
        }
        /*
         *Game::factory(3)->create([
         *   'user_id' => $user
         *]);
         */

    }
}
