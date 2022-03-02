<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdminGameController extends Controller
{
    public function index()
    {
        return view('admin.games.index', [
            'games' => Game::all() // paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store(StoreGameRequest $request)
    {
        $validate = $request->validated();
        $validate['user_id'] = Auth::user()->id;

        // si el thumbnail paso la validacion registra la imagen en public storage
        if (isset($validate['thumbnail'])){

            $validate['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }

        try {

            Game::create($validate);
            return redirect('/')->with('success', 'Game is successfully saved');

        } catch (\Exception $e) {
            throw new HttpException(500, 'Error Al Registrar');
        }
    }

    public function edit(Game $game)
    {
        return view('admin.games.edit',['game' => $game]);
    }

    public function update(UpdateGameRequest $request, Game $game)
    {
        // solo puede actualizar el creador del post
        $this->authorize('update',$game);

        $validate = $request->validated();
        if (isset($validate['thumbnail'])){

            $validate['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }
        $game->update($validate);

        return redirect()->back()->with('success', 'Game Updated!');
    }
    public function destroy(Game $game)
    {
        // solo el dueno del recurso puede eliminarlo
        $this->authorize('delete',$game);

        // si el thumbnail existe en la el storage lo elimina
        if (Storage::exists($game->thumbnail)) {
            Storage::delete($game->thumbnail);
        }
        $game->delete();

        return redirect()->back()->with('success', 'Game Deleted!');
    }

}
