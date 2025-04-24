<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Brand;

class Catalog extends Component
{

    public $catalog = [];
    public $inCart = [];
    public $favorites = [];
    public $brands = [];
    public $priceFrom;
    public $priceTo;
    public $sortDropActive;
    public $sortDropDefault = 'Популярные';
    public $sortDropItems = ['Популярные', 'Дешёвые', 'Дорогие', 'Со скидкой', 'Новинки'];

    public function mount() {
        $this->catalog = Product::all();
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

    public function refresh() {
        $this->favorites = [];
        $favorites = Favorite::all()->where('user_id', auth()->id());
        foreach ($favorites as $f) {
            $this->favorites[] = $f->product_id;
        }

        if (isset($_GET['category'])) {
            $this->catalog = $this->catalog->where('category_id', $_GET['category']);
            $this->priceFrom = $this->catalog->min('price_with_discount');
            $this->priceTo = $this->catalog->max('price_with_discount');
        }
    }

    public function addCart($id) {
        if ($cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $id)->first())
            $favorite->delete();
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

        $this->brands = Brand::all();

        $this->priceFrom = Product::min('price_with_discount');
        $this->priceTo = Product::max('price_with_discount');

        $this->favorites = [];
        $favorites = Favorite::all()->where('user_id', auth()->id());
        foreach ($favorites as $f) {
            $this->favorites[] = $f->product_id;
        }
        

        isset($_GET['sortBy']) ? $this->sortDropActive = $_GET['sortBy'] : $this->sortDropActive = $this->sortDropDefault;
        switch ($this->sortDropActive) {
            case 'Популярные':
                $this->catalog;
                break;
            case 'Дешёвые':
                $this->catalog = $this->catalog->sortBy('price_with_discount');
                break;
            case 'Дорогие':
                $this->catalog = $this->catalog->sortByDesc('price_with_discount');
                break;
            case 'Со скидкой':
                $this->catalog = $this->catalog->sortByDesc('discount');
                break;
            case 'Новинки':
                $this->catalog = $this->catalog->sortByDesc('created_at');
                break;
        }

        $check = [];
        foreach ($this->brands as $br) {
            if (isset($_GET[$br->name]) && $_GET[$br->name] == 'on') {
                $check[] = $br->id;
            }
        }

        if ($check) {
            $this->catalog = $this->catalog->whereIn('brand_id', $check);
        }

        if (isset($_GET['dis']) && $_GET['dis'] == 'dis10') {
            $this->catalog = $this->catalog->where('discount', '>=', 10);
        }

        if (isset($_GET['dis']) && $_GET['dis'] == 'dis30') {
            $this->catalog = $this->catalog->where('discount', '>=', 30);
        }

        if (isset($_GET['dis']) && $_GET['dis'] == 'dis50') {
            $this->catalog = $this->catalog->where('discount', '>=', 50);
        }

        if (isset($_GET['dis']) && $_GET['dis'] == 'dis70') {
            $this->catalog = $this->catalog->where('discount', '>=', 70);
        }

        if (isset($_GET['priceFrom']) && isset($_GET['priceTo'])) {
            $this->catalog = $this->catalog->whereBetween('price_with_discount', [$_GET['priceFrom'], $_GET['priceTo']]);
        }

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $this->catalog = Product::query()->when($search, function ($query, $search) {
                $query->where('description', 'like' , "%{$search}%")
                    ->orWhere('name', 'like' , "%{$search}%")
                    ->orWhere('brand_id', 'like' , "%{$search}%");
            })->get();
        }

        if (isset($_GET['category'])) {
            $this->catalog = $this->catalog->where('category_id', $_GET['category']);
            $this->priceFrom = $this->catalog->min('price_with_discount');
            $this->priceTo = $this->catalog->max('price_with_discount');
        }
        
        return view('livewire.catalog')->layout('components.layouts.app');
    }
}
