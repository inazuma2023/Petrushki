<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;

class OrderSummary extends Component
{

    public $start;
    public $discount;
    public $total;
    public $summary = [];
    public $delivery;

    public function saveDelivery() {
        auth()->user()->update(['address_delivery' => $this->delivery]);
    }

    public function render()
    {
        $carts = Cart::all();
        $start = 0;
        $discount = 0;
        $total = 0;

        foreach ($carts as $c) {
            if ($c->active) {
                $start += $c->quantity * Product::where('id', $c->product_id)->first()->price;
                $discount += $c->quantity * (Product::where('id', $c->product_id)->first()->price * (Product::where('id', $c->product_id)->first()->discount / 100));
                $total += $this->start - $this->discount;
            }
        }

        $this->start = $start;
        $this->discount = $discount;
        $this->total = $this->start - $this->discount;

        $this->summary = [];
        $product = Product::all();
        foreach ($product as $product) {
            foreach ($carts as $cart) {
                if ($cart->product_id == $product->id && $cart->active) {
                    $this->summary[] = $product;
                    break;
                }
            }
        }

        $this->delivery = auth()->user()->address_delivery;

        return view('livewire.order-summary')->layout('components.layouts.app');
    }
}
