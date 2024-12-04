@extends('../layouts/menuAdmin2')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
<!--estilos menu por id se indica acá-->
<link rel="stylesheet" href="../css/menu.css">
<div class="card">
    <h5 class="card-header">Detalle del Documento</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert" role="alert">
            <table class="table table-sm table-hover">
                <thead>
                    <th>Titulo</th>
                    <th>Documento</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$documento->titulo}}</td>
                        <td>{{$documento->documento}}</td>
                        <td>{{$documento->fecha}}</td>
                        <td>{{$documento->clientes->nombre}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
                @csrf
                @method('DELETE')
                <a href="{{ route('listadoreportes') }}" class="btn btn-secondary">
                    <img src="../img/volver-flecha.png" width="20px" height="20px">
                    Volver
                </a>
                <a href="../22321dsasxwsjfile/{{$documento->documento}}" class="btn btn-secondary">
                    <img src="../img/ver.png" width="20px" height="20px">
                    ver
                </a>
          
        </div>
        </p>
    </div>
</div>
@endsection