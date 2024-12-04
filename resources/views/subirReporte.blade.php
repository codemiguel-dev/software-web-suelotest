@extends('layouts.menu')

@section('contenido')
<div class="card">
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        {{ __('Reporte') }}
    </div>
    <div class="form-group">
        <form action="{{ route('envioinformeusuario') }}" method="POST" enctype="multipart/form-data"
            onSubmit="return validarcampossubireporte();">
            @csrf
            <label>Título</label>
            <div class="row">
                <div class="col">
                    <input type="text" name="titulo" class="form-control" id="titulo" required>
                </div>
                <div class="col">
                    <input type="text" value="{{ Auth::user()->id }}" name="cliente" class="form-control" required
                        readonly>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <input type="file" class="form-control-file" name="pdf" id="pdf" required>
                    @error('pdf')
                    <div class="alert alert-danger" role="alert">
                        campo vacío
                    </div>
                    @enderror
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-secondary" value="Registrar" name="accion">
                <img src="img/subir.png" width="20px" height="20px">
                Subir
            </button>
        </form>
    </div>
</div>
@endsection