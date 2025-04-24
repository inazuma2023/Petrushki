<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;

class Adminer extends Component
{
    use WithFileUploads;

    public $products;
    public $users;
    public $orders;
    public $reviews;

    #[Validate]
    public $name;

    #[Validate]
    public $brand;

    #[Validate]
    public $price;

    #[Validate]
    public $discount;

    #[Validate]
    public $product_image;

    #[Validate]
    public $description;

    #[Validate]
    public $category;

    public $seacrhAdm;

    public function rules() {
        return [
            'name' =>'required|string|max:255|min:5',
            'brand' =>'required|string|max:255',
            'price' =>'required|numeric|min:50',
            'discount' =>'required|numeric|min:0',
            'product_image' =>'required|image|max:2048',
            'description' =>'required|string|max:255',
            'category' =>'required|string|max:255',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Пожалуйста, введите название товара',
            'name.max' => 'Название товара не может быть длиннее 255 символов',
            'name.min' => 'Название товара должно быть не менее 5 символов',
            'brand.required' => 'Пожалуйста, выберите бренд товара',
            'brand.max' => 'Бренд товара не может быть длиннее 255 символов',
            'price.required' => 'Пожалуйста, введите цену товара',
            'price.numeric' => 'Цена должна быть числом',
            'price.min' => 'Цена должна быть не менее 50',
            'discount.required' => 'Пожалуйста, введите скидку на товар',
            'discount.numeric' => 'Скидка должна быть числом',
            'discount.min' => 'Скидка должна быть не менее 0',
            'product_image.required' => 'Пожалуйста, загрузите изображение товара',
            'product_image.image' => 'Загрузите изображение в формате jpg, png или jpeg',
            'product_image.max' => 'Изображение не может быть больше 2MB',
            'description.required' => 'Пожалуйста, введите описание товара',
            'description.max' => 'Описание товара не может быть длиннее 255 символов',
            'category.required' => 'Пожалуйста, выберите категорию товара',
            'category.max' => 'Категория товара не может быть длиннее 255 символов',
        ];
    }

    public function createProduct() {
        $this->validate();

        $article = random_int(1000000000, 9999999999);
        $this->product_image->storeAs('products', $article.'.png', 'public');
        Product::create([
            'article' => $article,
            'name' => $this->name,
            'brand_id' => $this->brand,
            'price' => $this->price,
            'discount' => $this->discount,
            'price_with_discount' => $this->price - ($this->price * ($this->discount / 100)),
            'description' => $this->description,
            'category_id' => $this->category,
        ]);

        return $this->redirect('/adminer');
    }

    public function delProduct($id) {
        $product = Product::where('article', $id)->first();
        $product->delete();
        return $this->redirect('/adminer?adminTab=Все товары');
    }

    public function editProduct($article) {
        $product = Product::where('article', $article)->first();
        $product->update([
            'name' => $this->name,
            'brand_id' => $this->brand,
            'price' => $this->price,
            'discount' => $this->discount,
            'price_with_discount' => $this->price - ($this->price * ($this->discount / 100)),
            'description' => $this->description,
            'category_id' => $this->category,
        ]);
    }

    public function changeStatus($number)  {
        $order = Order::where('number', $number)->first();
        $s = $order->status_id;
        if ($s < 5)
            $order->update(['status_id' => ++$s]);
        $order->save();

        return $this->redirect('/adminer?adminTab=Активные заказы');
    }

    public function deleteReview($id) {
        $review = Review::where('id', $id)->delete();
        return $this->redirect('/adminer?adminTab=Модерация отзывов');
    }

    public function allowReview($id) {
        $review = Review::where('id', $id)->first();
        $review->update(['moderation' => 1]);
        $review->save();

        return $this->redirect('/adminer?adminTab=Модерация отзывов');
    }

    public function inHome($id) {
        $product = Product::where('id', $id)->first();
        $product->update(['inHome' => 1]);
        $product->save();

        return $this->redirect('/adminer?adminTab=Товары на главной');
    }

    public function delHome($id) {
        $product = Product::where('id', $id)->first();
        $product->update(['inHome' => 0]);
        $product->save();

        return $this->redirect('/adminer?adminTab=Товары на главной');
    }

    public function render()
    {
        $this->products = Product::all();
        $this->users = User::all();
        $this->orders = Order::all();
        $this->reviews = Review::all();
        return view('livewire.adminer');
    }
}
