<?php

    use Illuminate\Support\Facades\Route;
    use App\Livewire\Home;
    use App\Livewire\Cart;
    use App\Livewire\Catalog;
    use App\Livewire\Favorite;
    use App\Livewire\OrderSummary;
    use App\Livewire\Payment;
    use App\Livewire\OrderList;
    use App\Livewire\OrderDetails;
    use App\Livewire\Profile;
    use App\Livewire\Product;
    use App\Livewire\Adminer;
    use App\Livewire\Login;
    use App\Livewire\Register;
    use App\Livewire\Tracking;

    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class);  
    Route::get('/', Home::class);
    Route::view('/user', 'livewire.user');
    Route::view('/dev', 'livewire.dev');
    Route::middleware(['auth'])->group(function () {
        Route::get('/adminer',Adminer::class);
        Route::get('/cart', Cart::class);
        Route::get('/catalog', Catalog::class);
        Route::get('/favorite', Favorite::class);
        Route::get('/order-summary', OrderSummary::class);
        Route::get('/payment', Payment::class);
        Route::get('/order-list', OrderList::class);
        Route::get('/order-details', OrderDetails::class);
        Route::get('/profile', Profile::class);
        Route::get('/product', Product::class);
        Route::get('/tracking', Tracking::class);
        Route::view('/accessibility', 'livewire.reg_1');
        Route::view('/backup', 'livewire.reg_2');
        Route::view('/security', 'livewire.reg_3');
    });







