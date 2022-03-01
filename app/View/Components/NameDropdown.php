<?php

namespace App\View\Components;

use App\Models\Game;
use Illuminate\View\Component;

class NameDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.name-dropdown', [
            'games' => Game::all(),
        ]);
    }
}
