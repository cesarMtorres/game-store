<?php


namespace App\Services;
use App\Models\Game;

class GameService

{
    public $model;

    public function getAll()
    {
        return [
             'games' => Game::latest()->filter(request(['search','author']))->paginate(3),
             'currentName' => Game::firstWhere('name', request('name')) ];
    }

    public function state($status)
    {
        return Game::where('state',$status)->get();
    }
}
