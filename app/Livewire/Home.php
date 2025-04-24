<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Favorite;
use App\Models\Cart;

class Home extends Component
{

    public $products_in_home = [];
    public $big_sales = [];
    public $favorites = [];
    public $inCart = [];

    public function likeToggle($id) {
        if ($favorite = Favorite::where('user_id', auth()->user()->id)->where('product_id', $id)->first()) {
            $favorite->delete();
        } else {
            Favorite::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ]);
        }
        $this->refresh();
    }   

    public function addCart($id) {
        if ($cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $id)->first())
            $cart->delete();
        else {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'quantity' => 1,
                'active' => true
            ]);
        }
    }

    public function refresh() {
        $this->favorites = [];
        $favorites = Favorite::all()->where('user_id', auth()->id());
        foreach ($favorites as $f) {
            $this->favorites[] = $f->product_id;
        }
    }

    public function render()
    {
        if (auth()->check()) {
            $cart = Cart::all()->where('user_id', auth()->user()->id);
            foreach ($cart as $c) {
                $this->inCart[] = $c->product_id;
            }
            $favorites = Favorite::all()->where('user_id', auth()->id());
            foreach ($favorites as $f) {
                $this->favorites[] = $f->product_id;
            }
        }
        $this->products_in_home = Product::where('inHome', true)->get();
        $this->big_sales = Product::where('discount', '>', 50)->get();
        return view('livewire.home')->layout('components.layouts.app');
    }
}
