<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cliente;

class UserController extends Controller
{

    public function index()
    {
        $datos = User::all();
        return view("admin.usuario", compact('datos'));
    }


    public function create()
    {
        //formulario para agregar los datos
        $datos = Cliente::all();
        return view('usuarioform.agregar', compact('datos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'clave' => 'required ',
            'rol' => 'required ',
            'empresacliente' => 'required ',
        ]);
        //guarda los datos en la base de datos
        $usuario = new User();
        $usuario->name = $request->post('nombre');
        $usuario->email = $request->post('correo');
        $usuario->password = Bcrypt($request->post('clave'));
        $usuario->role = $request->post('rol');
        $usuario->id_cliente_empresa = $request->post('empresacliente');
        $usuario->save();

        return redirect()->route("Usuario.index")->with("success", "Agregado con exito!");
    }

    public function show($id)
    {
        //metodo para traer los datos se van editar
        $user = User::find($id);
        return view("usuarioform.eliminar", compact('user'));
    }

    public function edit($id)
    {
        //metodo para traer los datos se van editar
        $user = User::find($id);
        $datos = Cliente::all();
        return view("usuarioform.actualizar", compact('user','datos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'clave' => 'required ',
            'rol' => 'required ',
            'empresacliente' => 'required ',
        ]);
        //actualiza los datos en la base de datos
        $user = User::find($id);
        $user->name = $request->post('nombre');
        $user->email = $request->post('correo');
        $user->password = Bcrypt($request->post('clave'));
        $user->role = $request->post('rol');
        $user->save();

        return redirect()->route("Usuario.index")->with("success", "Actualizado con exito!");
    }

    public function destroy($id)
    {
        //elimina el registro
        $user = User::find($id);
        $user->delete();
        return redirect()->route("Usuario.index")->with("success", "Eliminado con exito!");
    }
}