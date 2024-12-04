<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Registroreporte;
use App\Models\Cliente;
use App\Models\User;

class RegisterpdfController extends Controller
{

    public function index()
    {
        $datos = Cliente::all();
        return view("subirReporte", compact('datos'));
    }

    public function redirecionarsubirreporte()
    {
        $datos = Cliente::all();
        return view("admin/subirReporte", compact('datos'));
    }

    public function Insertar(Request $request){
        $request->validate([
            'titulo' => 'required',
            'cliente' => 'required',
        ]);
        //dd($request);
        try {
            DB::beginTransaction();
            $reg=new Registroreporte;
        if($request->hasFile('pdf')){
            $archivo=$request->file('pdf');
            $archivo->move(public_path().'/Archivos/',$archivo->getClientOriginalName());
            $reg->documento=$archivo->getClientOriginalName();
        }
        $reg->titulo = $request->post('titulo');
        $reg->id_cliente = $request->post('cliente');
        $reg->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return redirect()->route("listadoreportesusuario")->with("success", "Agregado con exito!");
    }
    public function Insertarinformeadmin(Request $request){
        $request->validate([
            'titulo' => 'required',
            'usuario' => 'required',
            'pdf' => 'required',
        ]);
        //dd($request);
        try {
            DB::beginTransaction();
            $reg=new Registroreporte;
        if($request->hasFile('pdf')){
            $archivo=$request->file('pdf');
            $archivo->move(public_path().'/22321dsasxwsjcdsasefefsxfile/',$archivo->getClientOriginalName());
            $reg->documento=$archivo->getClientOriginalName();
        }
        $reg->titulo = $request->post('titulo');
        $reg->id_cliente = $request->post('usuario');
        $reg->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return redirect()->route("listadoreportes")->with("success", "Agregado con exito!");
    }
    
}
