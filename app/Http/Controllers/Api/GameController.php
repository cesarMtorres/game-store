<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Services\GameService;


class GameController extends Controller
{

    protected $gameservice;

    public function __construct(GameService $gameservice)
    {
        $this->gameservice = $gameservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('games', $this->gameservice->getAll());

    }

    public function show(Game $game)
    {
        return view('games.show', [
            'game' => $game
        ]);
    }


    public function state($status)
    {
        return $this->gameservice->state($status);
    }
}
