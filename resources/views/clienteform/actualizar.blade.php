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
    <h5 class="card-header">Actualizar Cliente</h5>
    <div class="card-body">
        <p class="card-text">
        <form action="{{ route('Cliente.update', $cliente->id) }}" method="POST">
            @csrf
            @method("PUT")
            <!-- name debe ser igual a los campos de la tabla de la base de datos-->
            <label for="">Rut</label>
            <input type="text" name="rut" class="form-control" value="{{$cliente->rut}}">
            @error('rut')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$cliente->nombre}}">
            @error('nombre')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <label for="">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{$cliente->correo}}">
            @error('correo')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <label for="">Razon social</label>
            <input type="text" name="razonsocial" class="form-control" value="{{$cliente->razonsocial}}">
            @error('razonsocial')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <br>
            <a href="{{ route('Cliente.index') }}" class="btn btn-secondary">
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