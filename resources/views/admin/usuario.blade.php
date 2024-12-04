@extends('layouts.menuAdmin2')

@section('contenido')
<h3>Usuario</h3>
<div class="card-body">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('Usuario.create')}}" class="btn btn-secondary">
        <img src="../img/agregar.png" width="20px" height="20px">
        Agregar
    </a>
</div>
<div class="table table-responsive">
    <table class="table" id="tablacliente">
        <thead>
            <th></th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Empresa</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
        $contandor=1;
        ?>
            @foreach ($datos as $item)
            <tr>
                <td><?php echo $contandor?></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role }}</td>
                <td>{{ $item->clienteempresa->nombre}}</td>
                <td>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acciones
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a href="{{ route('Usuario.edit', $item->id) }}" class="dropdown-item">
                                <img src="../img/actualizar2.png" width="20px" height="20px">
                                Editar
                            </a>
                            <a href="{{ route('Usuario.show', $item->id) }}" class="dropdown-item">
                                <img src="../img/eliminar2.png" width="20px" height="20px">
                                Eliminar
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
            $contandor++;
            ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection