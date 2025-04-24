<?php

namespace App\Livewire;

use Livewire\Component;

class Navigation extends Component
{

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
