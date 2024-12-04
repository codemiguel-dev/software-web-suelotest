<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Panel de control</title>

    <!--icono superior-->
    <link rel="shortcut icon" href="img/suelotest-logo-corto.png" type="image/x-icon">

    <!--link para la paginación datatables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--estilos menu-->
    <link rel="stylesheet" href="css/menu.css">

    <style>
        @font-face {
        font-family: SulphurPoint;
        src: url('fuentes/SulphurPoint-Bold.ttf')
    }

    </style>


</head>

<body>
    <div id="app" style="font-family: SulphurPoint;">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))

        @endif

        @if (Route::has('register'))

        @endif
        @else
        <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
            <button id="sidebarCollapse" class="btn navbar-btn">
                <img src="img/menu.png" width="35px" height="35px" alt="">
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">
                <img width="125px" height="50px" src="img/suelotest-logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="img/menu.png" width="35px" height="35px" alt="">
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" id="link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            Salir<span class="sr-only">(current) </span>
                            <img src="img/cerrar-sesion.png" width="35px" height="35px" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="area"></div>
        <div class="wrapper fixed-left">
            <nav id="sidebar" class="active">
                <div class="sidebar-header">
                    <h3 style="font-family: AndadaPro;"><img src="img/usuario.png" width="40px" height="50px" alt=""> {{ Auth::user()->name }}</h3>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="{{ route('listadoreportesusuario') }}" class="text-light"><img src="img/informes.png"
                                width="35px" height="35px" alt=""> Lista de Informes</a>
                    </li>
                </ul>
                <div class="text-center">
                    <img width="90px" height="40px" src="img/marca-de-agua2.png" alt="" style="margin-top: 150px;">
                </div>
                @endguest
            </nav>

            <div id="content" class="active">
                <main class="py-1">
                    @yield('contenido')
                </main>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="js/funcion.js"></script>
<script>
$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        document.getElementById("bodyContent").style.width = "100%";
    });
});
</script>
<!--script link para la funciones de javascript datatables-->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<!--script funcional para la funcionalidad-->
<script>
$(document).ready(function() {
    $('#tablacliente').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontró registro",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Buscar : ",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});
</script>
<script>
function validarcampossubireporte() {

    var titulo = document.getElementsByName("titulo")[0].value;
    var pdf = document.getElementsByName("pdf")[0].value;

    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if ((titulo == "") || (pdf == "")) { //COMPRUEBA CAMPOS VACIOS
        alert("Los campos no pueden quedar vacios");
        return true;
    }
}
</script>
</html>