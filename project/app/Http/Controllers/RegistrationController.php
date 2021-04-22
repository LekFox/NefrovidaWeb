<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\users;


use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'requiered',
            'email' => 'requiered | email',
            //'role' => 'requiered',
            'password' => 'requiered'
        ]);

        users::create(request([
            'name'=> $request -> name,
            'email' => $request -> email,
            //'role' => $request -> role,
            'password' => Hash::make($request->password),
        ]));

        
    }
}