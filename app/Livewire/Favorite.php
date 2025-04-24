<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Favorite as FavoriteModel;
use App\Models\Cart;

class Favorite extends Component
{

    public $favorite = [];
    public $inCart = [];

    public function disLike($productId) {
        FavoriteModel::where('product_id', $productId)->where('user_id', auth()->user()->id)->delete();
        $this->refresh();
    }

    public function refresh() {
        $this->favorite = [];
        $favorites = FavoriteModel::all();
        $product = Product::all();
        foreach ($product as $product) {
            foreach ($favorites as $favorite) {
                if ($favorite->product_article == $product->id) {
                    $this->favorite[] = $product;
                    break;
                }
            }
        }
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

    public function render()
    {   
        $cart = Cart::all()->where('user_id', auth()->user()->id);
        foreach ($cart as $c) {
            $this->inCart[] = $c->product_id;
        }
        $this->favorite = [];
        $favorites = FavoriteModel::all();
        $product = Product::all();
        foreach ($product as $product) {
            foreach ($favorites as $favorite) {
                if ($favorite->product_id == $product->id) {
                    $this->favorite[] = $product;
                    break;
                }
            }
        }
        return view('livewire.favorite')->layout('components.layouts.app');
    }
}
