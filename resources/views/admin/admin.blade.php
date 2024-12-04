@extends('layouts.menuAdmin')

@section('contenido')
<link rel="stylesheet" href="css/menu.css">
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title">Bienvenido administrador {{ Auth::user()->name }}</h5>
        <div class="card-columns">
            <div class="card" style="width:400px">
                <img class="card-img-top" src="img/cantidadusuario.png" alt="Card image" width="500px" height="250x">
                <div class="card-body">
                    <h4 class="card-title">Usuarios registrados</h4>
                    <?php
            $contandorusuario=0;
        ?>
                    @foreach ($user as $item)
                    <?php
            $contandorusuario++;
        ?>
                    @endforeach
                    <h3><?php echo $contandorusuario?></h3>
                    <a href="{{ route('Usuario.index') }}" class="btn btn-success">Ir a la lista</a>
                </div>
            </div>
            <div class="card" style="width:400px">
                <img class="card-img-top" src="img/cantidadcliente.jpg" alt="Card image" width="500px" height="250px">
                <div class="card-body">
                    <h4 class="card-title">Clientes registrados</h4>
                    <?php
            $contandorcliente=0;
        ?>
                    @foreach ($client as $item)
                    <?php
            $contandorcliente++;
        ?>
                    @endforeach
                    <h3><?php echo $contandorcliente?></h3>
                    <a href="{{ route('Cliente.index') }}" class="btn btn-success">Ir a la lista</a>
                </div>
            </div>
            <div class="card" style="width:400px">
                <img class="card-img-top" src="img/cantidadinforme.jpg" alt="Card image" width="500px" height="250px">
                <div class="card-body">
                    <h4 class="card-title">Informes registrados</h4>
                    <?php
            $contandorinforme=0;
        ?>
                    @foreach ($informe as $item)
                    <?php
            $contandorinforme++;
        ?>
                    @endforeach
                    <h3><?php echo $contandorinforme?></h3>
                    <a href="{{ route('listadoreportes') }}" class="btn btn-success">Ir a la lista</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection