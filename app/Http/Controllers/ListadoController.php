<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Registroreporte;

class ListadoController extends Controller
{
    public function index()
    {
        $datos = Registroreporte::all();
        return view('listado', compact('datos'));
    }
    public function descargar($id)
    {
       //metodo para traer los datos se van editar
       $documento = Registroreporte::find($id);
       return view("documentoform.verinforme", compact('documento'));
    }
}
