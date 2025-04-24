<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class Tracking extends Component
{
    public $order;

    public function render()
    {
        if (isset($_GET['tracking'])) {
            $this->order = Order::where('number', $_GET['tracking'])->first();
        }

        return view('livewire.tracking')->layout('components.layouts.app');
    }
}
