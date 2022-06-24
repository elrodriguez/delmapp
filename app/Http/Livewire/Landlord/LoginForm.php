<?php

namespace App\Http\Livewire\Landlord;

use App\Models\Landlord\Administrator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{

    public $email;
    public $password;
    public $rememberme = false;

    public function render()
    {
        return view('livewire.landlord.login-form');
    }

    public function login()
    {

        $this->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        if (Auth::guard('admins')->attempt(array('email' => $this->email, 'password' => $this->password))) {
            request()->session()->regenerate();
            return redirect()->intended('system/dashboard');
        } else {
            session()->flash('error', 'email and password are wrong.');
        }
    }
}
