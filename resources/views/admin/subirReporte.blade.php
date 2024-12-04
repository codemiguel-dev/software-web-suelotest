@extends('layouts.menuAdmin2')

@section('contenido')
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <h3>Sube tu informe</h3>
</div>
<form action="{{ route('envioinformeadmin') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Título</label>
    <div class="row">
        <div class="col">
            <input type="text" name="titulo" class="form-control">
            @error('titulo')
            <div class="alert alert-danger" role="alert">
                Campo vacío
            </div>
            @enderror
        </div>
        <div class="col">
            <select class="custom-select" name="usuario" required>
                @foreach ($datos as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <input type="file" class="form-control-file" name="pdf">
            @error('pdf')
            <div class="alert alert-danger" role="alert">
                Seleccione un archivo
            </div>
            @enderror
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-secondary" value="Registrar" name="accion">
        <img src="../img/subir.png" width="20px" height="20px">
        Subir
    </button>
</form>
@endsection