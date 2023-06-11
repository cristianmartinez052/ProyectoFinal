<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //

    public function index()
    {
        $usuarios = User::where('is_admin','=','0')->get();
        return view('usuarios.index', compact('usuarios'));
    }
}
