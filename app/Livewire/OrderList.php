<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderList extends Component
{

    public $orders;

    public function cancelOrder($number) {
        $order = Order::where('number', $number)->first();
        $order->update([
            'status_id' => 6,
        ]);
    }

    public function repeatOrder($number) {
        $order = Order::where('number', $number)->first();
        $order->update([
            'status_id' => 1,
        ]);
    }

    public function render()
    {
        $this->orders = Order::all()->where('user_id', auth()->user()->id);
        return view('livewire.order-list')->layout('components.layouts.app');
    }
}
