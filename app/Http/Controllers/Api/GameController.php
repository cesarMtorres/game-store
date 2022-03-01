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
        //$this->middleware('auth', ['except' => ['index', 'show']]);
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

    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)
    {
        $validate = $request->validated();
        $validate['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        #$validate->user = Auth::user();

        try {
            $this->game->store($validate);
            return redirect('/games')->with('success', 'Game is successfully saved');
        } catch (\Exception $e) {
            throw new HttpException(500, 'Error Al Registrar');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('game',['games' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGameRequest  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGameRequest $request)
    {
      /*
       *if ($request->user()->id !== $game->user_id) {
       *  return response()->json(['error' => 'You can only edit your own books.'], 403);
       *}
       */
        $validate = $request->validated();
       // $game->update($request->$validate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        try {
            $this->game->delete($game);
            return back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function state($status)
    {
        return Game::where('state',$status)->get();
    }
}
