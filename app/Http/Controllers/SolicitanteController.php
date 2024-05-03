<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitanteController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('dashboard-solicitante.menu', ['user' => $user]);

    }
}
