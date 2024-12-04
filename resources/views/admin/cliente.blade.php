@extends('layouts.menuAdmin2')

@section('contenido')
<h3>Clientes</h3>
<div class="card-body">
    <!--validación de alertas al hacer acciones como por ejemplo agregar un cliente-->
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('Cliente.create')}}" class="btn btn-secondary">
        <img src="../img/agregar.png" width="20px" height="20px">
        Agregar
    </a>
</div>
<div class="table table-responsive">
    <table class="table" id="tablacliente">
        <thead>
            <th></th>
            <th>Rut</th>
            <th>Fantasía</th>
            <th>Correo</th>
            <th>Razon social</th>
            <th></th>
        </thead>
        <tbody>
            <?php
        $contandor=1;
        ?>
            @foreach ($datos as $item)
            <tr>
                <td><?php echo $contandor?></td>
                <td>{{ $item->rut }}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->correo }}</td>
                <td>{{ $item->razonsocial }}</td>
                <td>
                    <!--   
                        <form action="{{ route('Cliente.edit', $item->id) }}" method="get">
                            <button class="btn btn-warning btn-sm">
                                <img src="../img/actualizar.png" width="20px" height="20px">
                                Editar
                            </button>
                        </form>
                        -->
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acciones
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a href="{{ route('Cliente.edit', $item->id) }}" class="dropdown-item">
                                <img src="../img/actualizar2.png" width="20px" height="20px">
                                Editar
                            </a>
                            <a href="{{ route('Cliente.show', $item->id) }}" class="dropdown-item">
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