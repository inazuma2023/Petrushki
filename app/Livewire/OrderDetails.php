<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;

class OrderDetails extends Component
{

    public $order;
    public $orderItems;
    public $start = 0;
    public $discount = 0;
    public $total = 0;

    public function render()
    {   
        $order = Order::where('number', $_GET['orderInfo'])->first();
        $this->order = $order;
        $this->orderItems = json_decode($order->products);

        $start = 0;
        $discount = 0;
        $total = 0;



        foreach ($this->orderItems as $c) {
            $start += $c->quantity * Product::where('id', $c->product_id)->first()->price;
            $discount += $c->quantity * (Product::where('id', $c->product_id)->first()->price * (Product::where('id', $c->product_id)->first()->discount / 100));
            $total += $this->start - $this->discount;
        }

        $this->start = $start;
        $this->discount = $discount;
        $this->total = $this->start - $this->discount;

        return view('livewire.order-details')->layout('components.layouts.app');
    }
}
