<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\users;
use Illuminate\Http\Request;

class registrarUsuariosController extends Controller
{
    public function index()
    {
        return view('usuarios.create');
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

        return view('usuarios.create');
        
    }
}
