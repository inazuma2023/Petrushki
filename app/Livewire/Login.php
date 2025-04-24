<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{
    #[Validate]
    public $email = '';

    #[Validate]
    public $password = '';

    public $login_message = '';

    public function rules() {
        return [
            'email' =>'required|email',
            'password' => 'required|min:8'
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Пожалуйста, введите email',
            'email.email' => 'Пожалуйста, введите корректный email',
            'password.required' => 'Пожалуйста, введите пароль',
            'password.min' => 'Пароль должен быть не менее 8 символов'
        ];
    }

    public function login()
    {
        $this->validate();

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password]) && $this->email !== 'admin@admin.com') {
            return redirect()->intended('/');
        } elseif (auth()->attempt(['email' => $this->email, 'password' => $this->password]) && $this->email == 'admin@admin.com') {
            return redirect()->intended('/adminer');
        } else {
            $this->login_message = 'Неправильный email или пароль';
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
