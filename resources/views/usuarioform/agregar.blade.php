@extends('../layouts/menuAdmin2')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
<div class="card">
    <h5 class="card-header">Agrega Nuevo Usuario</h5>
    <div class="card-body">
        <p class="card-text">
        <form action="{{ route('Usuario.store') }}" method="POST">
            @csrf
            <!-- name debe ser igual a los campos de la tabla de la base de datos-->
            <label for="">Nombre Fantasía</label>
            <input type="text" name="nombre" class="form-control">
            @error('nombre')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <label for="">Correo</label>
            <input type="email" name="correo" class="form-control">
            @error('correo')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <label for="">Contraseña</label>
            <input type="password" name="clave" class="form-control">
            @error('clave')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <label for="">Rol</label>
            <select class="custom-select" name="rol">
                <option value="admin">Administrador</option>
                <option value="usuario">Cliente</option>
            </select>
            @error('rol')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <label for="">Empresa cliente</label>
            <select class="custom-select" name="empresacliente">
                @foreach ($datos as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            @error('empresacliente')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <br>
            <br>
            <a href="{{ route('Usuario.index')}}" class="btn btn-secondary">
                <img src="../img/volver-flecha.png" width="20px" height="20px">
                Volver
            </a>
            <button class="btn btn-secondary">
                <img src="../img/agregar.png" width="20px" height="20px">
                Agregar
            </button>
        </form>
        </p>
    </div>
</div>
@endsection