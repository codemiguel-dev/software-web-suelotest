<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Registroreporte;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            return redirect()->route('admin.index');
        }else {
            $informe = Registroreporte::all();
            $client = Cliente::all();
            $user = User::all();
            return view('home', compact('user','client','informe'));
        }
    }
}
