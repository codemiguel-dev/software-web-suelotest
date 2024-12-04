@extends('../layouts/menuAdmin2')

@section("tituloPagina", "Actualizar registro")

@section('contenido')
<link rel="shortcut icon" href="../img/suelotest-logo-corto.png" type="image/x-icon">
<!--estilos menu por id se indica acá-->
<link rel="stylesheet" href="../css/menu.css">
<!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<div class="card">
    <h5 class="card-header">Actualizar Usuario</h5>
    <div class="card-body">
        <p class="card-text">
        <form action="{{ route('Usuario.update', $user->id) }}" method="POST">
            @csrf
            @method("PUT")
            <!-- name debe ser igual a los campos de la tabla de la base de datos-->
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$user->name}}">
            @error('nombre')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <label for="">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{$user->email}}">
            @error('correo')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <label for="">Contraseña</label>
            <input type="password" name="clave" class="form-control" placeholder="ingrese contraseña nueva">
            @error('clave')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <label for="">Rol</label>
            <select class="custom-select" name="rol">
                <option selected>seleccione rol</option>
                <option value="admin">Administrador</option>
                <option value="cliente">Cliente</option>
            </select>
            <label for="">Empresa cliente</label>
            <select class="custom-select" name="empresacliente">
                <option selected>seleccione empresa</option>
                @foreach ($datos as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <a href="{{ route('Usuario.index')}}" class="btn btn-secondary">
                <img src="../img/volver-flecha.png" width="20px" height="20px">
                Volver
            </a>
            <button class="btn btn-secondary">
                <img src="../img/actualizar.png" width="20px" height="20px">
                Guardar
            </button>
        </form>
        </p>
    </div>
</div>
@endsection