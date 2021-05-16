<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class registrarUsuariosController extends Controller
{
    public static function index()
    {
        /*if (Auth::user()->cannot('create', User::class)) {
            abort(403);
        }*/
        
        return view('auth.register');
    }

    /*public function store(Request $request)
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
        
    }*/

   

}
