@extends('../layouts/menuAdmin2')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
<!--estilos menu por id se indica acá-->
<link rel="stylesheet" href="../css/menu.css">
<div class="card">
    <h5 class="card-header">Eliminar Documento</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            ¿Estás seguro de eliminar este documento?
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
            <form action="{{ route('Documento.destroy', $documento->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('listadoreportes') }}" class="btn btn-secondary">
                    <img src="../img/volver-flecha.png" width="20px" height="20px">
                    Volver
                </a>
                <button class="btn btn-secondary">
                    <img src="../img/eliminar.png" width="20px" height="20px">
                    Eliminar
                </button>
            </form>
        </div>
        </p>
    </div>
</div>
@endsection