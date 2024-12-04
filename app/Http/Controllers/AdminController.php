<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registroreporte;
use App\Models\Cliente;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $informe = Registroreporte::all();
        $client = Cliente::all();
        $user = User::all();
        return view('admin.admin', compact('user','client','informe'));
    }
    public function listainforme(){
        $datos = Registroreporte::all();
        return view('admin.listado', compact('datos'));
    }
    public function show($id)
    {
        //metodo para traer los datos se van editar
        $documento = Registroreporte::find($id);
        return view("documentoform.eliminar", compact('documento'));
    }
    public function destroy($id)
    {
        //elimina el registro
        $documento = Registroreporte::find($id);
        $documento->delete();
        return redirect()->route("listadoreportes")->with("success", "Eliminado con exito!");
    }
}
