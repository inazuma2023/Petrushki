<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart as CartModel;
use App\Models\Favorite;

class Cart extends Component
{

    public $cart = [];
    public $favorites = [];
    public $start = 0;
    public $total = 0;
    public $discount = 0;
    public $products = [];
    public $active = [];
    

    public function activeToggle($article) {
        $p = Product::where('article', $article)->first()->id;
        $c = CartModel::where('user_id', auth()->user()->id)->where('product_id', $p)->first();
        $c->active ? $c->update(['active' => false]) : $c->update(['active' => true]);
    }

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


    public function deleteCart($id) {
        CartModel::where('user_id', auth()->user()->id)->where('product_id', $id)->delete();
    }   

    public function refresh() {
        $this->favorites = [];
        $favorites = Favorite::all()->where('user_id', auth()->id());
        foreach ($favorites as $f) {
            $this->favorites[] = $f->product_id;
        } 
    }

    public function increment($id) {
        $cart = CartModel::where('product_id', $id)->where('user_id', auth()->user()->id)->first();
        $cart->quantity++;
        $cart->save();
    }

    public function decrement($id) {
        $cart = CartModel::where('product_id', $id)->where('user_id', auth()->user()->id)->first();
        if ($cart->quantity > 1) {
            $cart->quantity--;
            $cart->save();
        } else {
            $cart->delete();
        }
    }

    public function render()
    {
        $carts = CartModel::where('user_id', auth()->user()->id);
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

        $this->cart = [];
        $favorites = Favorite::all()->where('user_id', auth()->id());
        foreach ($favorites as $f) {
            $this->favorites[] = $f->product_id;
        }
        $product = Product::all();
        $this->products = [];
        foreach ($product as $product) {
            foreach ($carts as $cart) {
                if ($cart->product_id == $product->id) {
                    $this->cart[] = $product;
                } else {
                    $this->products[] = $product;
                }
            }
        }

        return view('livewire.cart')->layout('components.layouts.app');
    }
}
