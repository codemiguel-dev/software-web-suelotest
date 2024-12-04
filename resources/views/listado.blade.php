@extends('layouts.menu')

@section('contenido')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<table class="table table" id="tablacliente">
    <thead>
        <th></th>
        <th>Título</th>
        <th>Documento</th>
        <th>Fecha</th>
        <th>cliente</th>
        <th>Vista</th>
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
            <!--el clientes es la función del modelo Registroreporte-->
            <td>{{$d->clientes->nombre}}</td>
            <!--target="blank_" es para abrir otra pestaña-->
            <td>
                <a href="Archivos/{{$d->documento}}" class="btn btn-secondary" target="blank_">
                    <img src="img/ver.png" width="20px" height="20px">
                </a>
            </td>
            <?php
            $contandor++;
            ?>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection