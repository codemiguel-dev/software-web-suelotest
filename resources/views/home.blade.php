@extends('layouts.menu')

@section('contenido')
<div class="card text-center" style="font-family: AndadaPro;">
    <div class="card-body">
        <h5 class="card-title">Bienvenido cliente {{ Auth::user()->name }}</h5>
        <div class="card-columns">
            <div class="card" style="width:400px">
                <img class="card-img-top" src="img/cantidadinforme.jpg" alt="Card image" width="500px" height="250px">
                <div class="card-body">
                    <h4 class="card-title">Informes Registrados</h4>
                    <?php
            $contandorinforme=0;
        ?>
                    @foreach ($informe as $item)
                    <?php
            $contandorinforme++;
        ?>
                    @endforeach
                    <h3><?php echo $contandorinforme?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection