<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;

class Payment extends Component
{

    public $start = 0;
    public $total = 0;
    public $discount = 0;

    #[Validate]
    public $name = '';

    #[Validate]
    public $number = '';

    #[Validate]
    public $cvv = '';

    #[Validate]
    public $data = '';

    public function rules() {
        return [
            'name' => 'required|regex:/^\S+\s\S+$/',
            'number' => 'required|numeric',
            'cvv' => 'required|min:3|max:3',
            'data' => 'required|date_format:m/y|after:now',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Имя обязательно для заполнения',
            'name.regex' => 'Имя не должно содержать два слова (имя и фамилия)',
            'number.required' => 'Номер карты обязатен для заполнения',
            'number.numeric' => 'Номер карты должен состоять только из цифр',
            'cvv.required' => 'CVV обязатен для заполнения',
            'cvv.min' => 'CVV должен быть не менее 3-х цифр',
            'cvv.max' => 'CVV должен быть не более 3-х цифр',
            'data.required' => 'Срок действия обязатен для заполнения',
            'data.date_format' => 'Неверный формат даты (mm/yy)',
            'data.after' => 'Срок действия карты должен быть в будущем',
        ];
    }

    public function pay()
    {
        $this->validate();
        $products = [];

        $cart = Cart::all()->where('user_id', auth()->user()->id);
        foreach ($cart as $c) {
            if ($c->active) {
                $products[] = [
                    'product_id' => $c->product_id,
                    'quantity' => $c->quantity,
                    'price' => Product::where('id', $c->product_id)->first()->price,
                    'discount' => Product::where('id', $c->product_id)->first()->discount,
                ];
            }
        }
        $products = json_encode($products);
        Order::create([
            'user_id' => auth()->user()->id,
            'number' => random_int(100000000, 999999999),
            'products' => $products,
            'date' => now(),
            'status_id' => 1,
            'total' => $this->start - $this->discount,
            'pick_up' => auth()->user()->address_delivery
        ]);

        $u_t = auth()->user()->total;
        $u_d = auth()->user()->discount;

        auth()->user()->update([
            'total' => $u_t + $this->start - $this->discount,
            'discount' => $u_d + $this->discount
        ]);
        
        foreach ($cart as $c) {
            if ($c->active) {
                $c->delete();
            }
        }

        return redirect('/order-list');
    }

    public function paySbp()
    {
        $products = [];

        $cart = Cart::all()->where('user_id', auth()->user()->id);
        foreach ($cart as $c) {
            if ($c->active) {
                $products[] = [
                    'product_id' => $c->product_id,
                    'quantity' => $c->quantity,
                    'price' => Product::where('id', $c->product_id)->first()->price,
                    'discount' => Product::where('id', $c->product_id)->first()->discount,
                ];
            }
        }
        $products = json_encode($products);
        Order::create([
            'user_id' => auth()->user()->id,
            'number' => random_int(100000000, 999999999),
            'products' => $products,
            'date' => now(),
            'status_id' => 1,
            'total' => $this->start - $this->discount,
            'pick_up' => auth()->user()->address_delivery
        ]);

        $u_t = auth()->user()->total;
        $u_d = auth()->user()->discount;

        auth()->user()->update([
            'total' => $u_t + $this->start - $this->discount,
            'discount' => $u_d + $this->discount
        ]);
        
        foreach ($cart as $c) {
            if ($c->active) {
                $c->delete();
            }
        }

        return redirect('/order-list');
    }

    public function render()
    {
        $carts = Cart::all();
        $start = 0;
        $discount = 0;
        $total = 0;

        foreach ($carts as $c) {
            if($c->active) {
                $start += $c->quantity * Product::where('id', $c->product_id)->first()->price;
                $discount += $c->quantity * (Product::where('id', $c->product_id)->first()->price * (Product::where('id', $c->product_id)->first()->discount / 100));
                $total += $this->start - $this->discount;
            }
        }

        $this->start = $start;
        $this->discount = $discount;
        $this->total = $this->start - $this->discount;
        return view('livewire.payment')->layout('components.layouts.app');
    }
}
