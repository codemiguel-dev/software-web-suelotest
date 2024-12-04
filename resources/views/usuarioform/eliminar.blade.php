@extends('../layouts/menuAdmin2')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
<!--estilos menu por id se indica acá-->
<link rel="stylesheet" href="../css/menu.css">
<div class="card">
    <h5 class="card-header">Eliminar Usuario</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            ¿Estás seguro de eliminar este registro?
            <table class="table table-sm table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Empresa</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->clienteempresa->nombre }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('Usuario.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('Usuario.index') }}" class="btn btn-secondary">
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