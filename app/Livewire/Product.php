<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use App\Models\Favorite;
use App\Models\Cart;
use App\Models\Review;

class Product extends Component
{
    public $product;
    public $favorites = [];
    public $inCart = [];
    public $review;
    public $rating = 3;
    public $reviews = [];

    public function likeToggle($id) {
        if ($favorite = Favorite::where('user_id', auth()->user()->id)->where('product_id', $id)->first()) {
            $favorite->delete();
        } else {
            Favorite::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ]);
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
        $this->product = ProductModel::where('id', $id)->first();
    }

    public function refresh() {
        $this->favorites = [];
        $favorites = Favorite::all()->where('user_id', auth()->id());
        foreach ($favorites as $f) {
            $this->favorites[] = $f->product_id;
        }
    }

    public function rate($stars)
    {
        return $this->rating = $stars;
    }

    public function createReview($id) {
        $article = ProductModel::where('id', $id)->first();
        Review::create([
            'product_id' => $id,
            'text' => $this->review,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id,
        ]);

       return redirect('/product?product='.$article->article);
    }


    public function render()
    {
        $cart = Cart::all()->where('user_id', auth()->user()->id);
        foreach ($cart as $c) {
            $this->inCart[] = $c->product_id;
        }
        $favorites = Favorite::all()->where('user_id', auth()->id());
        foreach ($favorites as $f) {
            $this->favorites[] = $f->product_id;
        }
        if (isset($_GET['product'])) 
            $this->product = ProductModel::where('article', $_GET['product'])->first();
        
        $this->reviews = Review::all()->where('product_id', $this->product->id);
        return view('livewire.product')->layout('components.layouts.app');
    }
}
