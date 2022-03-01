<?php

namespace App\Repositories;

use App\Interfaces\GameRepositoryInterface;
use App\Models\Game;

class GameRepository implements GameRepositoryInterface
{

  public function all()
  {
    return Game::all(); // paginate api
  }

  public function get($id)
  {
    return Game::findOrFail($id);
  }

  public function update($id, array $data)
  {
      return Game::find($id)->update($data);
  }

  public function store(array $data)
  {
      return Game::create($data);
  }

  public function delete($id)
  {
      return Game::destroy($id);
  }

}

