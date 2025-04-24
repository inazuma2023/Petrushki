<?php
    namespace App\Livewire;
    use Livewire\Component;
    use App\Models\User;
    class Register extends Component {
        #[Validate]
        public $name = '';
        #[Validate]
        public $email = '';
        #[Validate]
        public $password = '';
        #[Validate]
        public $confirm_password = '';
        public function rules() {
            return [
                'name' =>'required|string|max:255|min:5',
                'email' =>'required|email|unique:users',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ];
        }
        public function messages() {
            return [
                'name.required' => 'Пожалуйста, введите имя',
                'name.max' => 'Имя не может быть длиннее 255 символов',
                'name.min' => 'Имя должно быть не менее 5 символов',
                'email.required' => 'Пожалуйста, введите email',
                'email.email' => 'Пожалуйста, введите корректный email',
                'email.unique' => 'Этот email уже зарегистрирован',
                'password.required' => 'Пожалуйста, введите пароль',
                'password.min' => 'Пароль должен быть не менее 8 символов',
                'confirm_password.required' => 'Пожалуйста, подтвердите пароль',
                'confirm_password.same' => 'Пароли не совпадают'
            ];
        }
        public function register() {
            $this->validate();
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'address_delivery' => 'Выберите пункт выдачи'
            ]);
            return $this->redirect('/login');
        }
        public function render()
        {
            return view('livewire.register');
        }
    }


