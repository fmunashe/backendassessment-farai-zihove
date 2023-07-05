<?php

namespace App\Http\Livewire\Home;

use App\Models\Todo;
use App\Models\User;
use Livewire\Component;

class HomeIndex extends Component
{

    public $totalUsers;
    public $totalTodos;

    public function mount()
    {
        $this->totalUsers = User::query()->count();
        $this->totalTodos = Todo::query()->count();
    }

    public function render()
    {
        return view('livewire.home.home-index');
    }
}
