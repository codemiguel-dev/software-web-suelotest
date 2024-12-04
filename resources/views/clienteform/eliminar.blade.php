@extends('../layouts/menuAdmin2')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
<!--estilos menu por id se indica acá-->
<link rel="stylesheet" href="../css/menu.css">
<div class="card">
    <h5 class="card-header">Eliminar Cliente</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            ¿Estás seguro de eliminar este registro?

            <table class="table table-sm table-hover">
                <thead>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Razon social</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $cliente->rut }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->correo }}</td>
                        <td>{{ $cliente->razonsocial }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('Cliente.destroy', $cliente->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('Cliente.index') }}" class="btn btn-secondary">
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