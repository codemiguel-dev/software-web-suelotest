@extends('layouts.menuAdmin2')

@section('contenido')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<h3>Listado de tus informes</h3>
<table class="table table" id="tablacliente">
    <thead>
        <th></th>
        <th>Título</th>
        <th>Documento</th>
        <th>Fecha y hora</th>
        <th>Cliente</th>
        <th></th>
    </thead>
    <tbody>
        <?php
        $contandor=1;
        ?>
        @foreach($datos as $d)
        <tr>
            <td><?php echo $contandor?></td>
            <td>{{$d->titulo}}</td>
            <td>{{$d->documento}}</td>
            <td>{{$d->fecha}}</td>
            <td>{{$d->clientes->nombre}}</td>
            <!--target="blank_" es para abrir otra pestaña-->
            <td>
                <div class="input-group">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary">Acciones</button>
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{ route('descargarinforme', $d->id) }}" class="dropdown-item" target="blank_">
                                <img src="../img/ver2.png" width="20px" height="20px">
                                Detalle
                            </a>
                            <a href="{{ route('Documento.show', $d->id) }}" class="dropdown-item">
                                <img src="../img/eliminar2.png" width="20px" height="20px">
                                Eliminar
                            </a>
                        </div>
                    </div>
                </div>
            </td>
            <?php
            $contandor++;
            ?>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection