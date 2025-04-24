<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class Profile extends Component
{

    use WithFileUploads;

    #[Validate]
    public $fullname = '';

    #[Validate]
    public $phone = '';

    #[Validate]
    public $avatar;

    public function rules() {
        return [
            'fullname' =>'string|max:255|min:5',
            'delivery' =>'string|max:255',
            'courier' =>'string|max:255',
            'phone' =>'string|min:11',
        ];
    }

    public function messages() {
        return [
            'fullname.required' => 'Пожалуйста, введите полное имя',
            'fullname.max' => 'Имя не может быть длиннее 255 символов',
            'fullname.min' => 'Имя должно быть не менее 5 символов',
            'delivery.required' => 'Пожалуйста, выберите адрес удобного пункта выдачи',
            'delivery.max' => 'Адрес не может быть длиннее 255 символов',
            'courier.required' => 'Пожалуйста, введите адрес доставки курьером',
            'courier.max' => 'Адрес доставки курьером не может быть длиннее 255 символов',
            'phone.required' => 'Пожалуйста, введите номер телефона',
            'phone.min' => 'Номер телефона должен быть не менее 11 символов',
            'phone.max' => 'Номер телефона не может быть длиннее 11 символов',
            'phone.unique' => 'Такой номер телефон уже зарегистрирован',
        ];
    }

    public function editProfile()
    {
        $this->validate();

        if ($this->fullname)
            auth()->user()->update(['fullname' => $this->fullname]);
            
        if ($this->delivery)
            auth()->user()->update(['address_delivery' => $this->delivery]);

        if ($this->courier)
            auth()->user()->update(['address_courier' => $this->courier]); 
            
        if ($this->phone)
            auth()->user()->update(['phone' => $this->phone]); 
 
        return $this->redirect('/profile');
    }

    public function editAvatar()
    {
        auth()->user()->update([$this->avatar->storeAs('avatar', auth()->user()->id.'.png', 'public'),]);
 
        return $this->redirect('/profile');
    }

    public function render()
    {
        return view('livewire.profile')->layout('components.layouts.app');
    }
}
