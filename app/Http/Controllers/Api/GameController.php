<?php

namespace App\Http\Controllers\Api;

use App\Services\GameService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;;
use App\Http\Requests\UpdateGameRequest;
use App\Interfaces\GameRepositoryInterface;
use App\Models\Game;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\HttpKernel\Exception\HttpException;

class GameController extends Controller
{

    protected $game;

    public function __construct(GameRepositoryInterface $game)
    {
        $this->game = $game;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('games', [
            'games' => Game::latest()->filter(request(['search','author']))->paginate(3),
            'currentName' => Game::firstWhere('name', request('name'))
        ]);
    }
    public function show(Game $game)
    {
        return view('games.show', [
            'game' => $game
        ]);
    }


    public function state($status)
    {
        return Game::where('state',$status)->get();
    }
}
