@extends('../layouts/menuAdmin')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
<div class="card">
    <h5 class="card-header">Agrega Nuevo Cliente</h5>
    <div class="card-body">
        <p class="card-text">
        <form action="{{ route('Cliente.store') }}" method="POST" onsubmit="javascript:return Rut(document.form1.rut.value)" name="form1">
            @csrf
            <!-- name debe ser igual a los campos de la tabla de la base de datos-->
            <label for="">Rut</label>
            <input type="text" name="rut" class="form-control">
            @error('rut')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
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
            <label for="">Razon social</label>
            <input type="text" name="razonsocial" class="form-control">
            @error('razonsocial')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
            <br>
            <a href="{{ route('Cliente.index') }}" class="btn btn-secondary">
                <img src="img/volver-flecha.png" width="20px" height="20px">
                Volver
            </a>
            <button class="btn btn-secondary">
                <img src="img/agregar.png" width="20px" height="20px">
                Agregar
            </button>
        </form>
        </p>
    </div>
</div>
@endsection