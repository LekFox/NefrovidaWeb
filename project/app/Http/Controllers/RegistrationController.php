<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $this->validate(request(),[
            'name'=> 'requiered',
            'email' => 'requiered | email',
            'role' => 'requiered',
            'password' => 'requiered'
        ]);

        $user = User::create(request(['name','email', 'role','password']));

        //auth()->login($user);
    }
}
