<?php

namespace Tests\Feature;

use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_game()
    {
        Storage::fake('local');
        $file = UploadedFile::fake()->image('logo.jpeg');

        $response = $this->post('/games', [
            'name' => 'titulo test',
            'description' => 'Adipisicing aperiam ipsum animi consequuntur unde',
            'url' => 'http://www.promarketing.com',
            'thumbnail' => $file,
            'status' => 'ONLINE'
        ]);

        $response->assertOk();

        $response->assertCount(1, Game::all());
    }
}
