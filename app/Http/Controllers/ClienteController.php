<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    
    public function index()
    {
        $datos = Cliente::all();
        return view("admin/cliente", compact('datos'));
    }

    public function create()
    {
        //formulario para agregar los datos
        return view('clienteform.agregar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rut' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'razonsocial' => 'required ',
        ]);
        //guarda los datos en la base de datos
        $cliente = new Cliente();
        $cliente->rut = $request->post('rut');
        $cliente->nombre = $request->post('nombre');
        $cliente->correo = $request->post('correo');
        $cliente->razonsocial = $request->post('razonsocial');
        $cliente->save();

        return redirect()->route("Cliente.index")->with("success", "Agregado con exito!");
    }

    public function show($id)
    {
        //obtiene los registro de la tabla
        $cliente = Cliente::find($id);
        return view("clienteform.eliminar", compact('cliente'));
    }

    public function edit($id)
    {
        //metodo para traer los datos se van editar
        $cliente = Cliente::find($id);
        return view("clienteform.actualizar", compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rut' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'razonsocial' => 'required ',
        ]);
        //actualiza los datos en la base de datos
        $cliente = Cliente::find($id);
        $cliente->rut = $request->post('rut');
        $cliente->nombre = $request->post('nombre');
        $cliente->correo = $request->post('correo');
        $cliente->razonsocial = $request->post('razonsocial');
        $cliente->save();

        return redirect()->route("Cliente.index")->with("success", "Actualizado con exito!");
    }

    public function destroy($id)
    {
        //elimina el registro
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route("Cliente.index")->with("success", "Eliminado con exito!");
    }
}