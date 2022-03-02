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

        $user = User::factory()->create([
            'username' => 'adassa2ssdasmin',
            'email' => 'daddase2adsasdmin@admin.com',
            'password' => Hash('md5','password')
        ]);
// registrar todo los datos de un json
        $json = Storage::get(__DIR__ . '/data.json');
        $data = json_decode($json);

        foreach ($data as $item){
            Game::create(array(
                'name' => $item->name,
                'user_id' => $user,
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
