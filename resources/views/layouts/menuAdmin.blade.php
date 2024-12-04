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

    <!--estilo personalizado-->
    <link rel="stylesheet" href="css/personalizado.css">

    <style>
        @font-face {
        font-family: SulphurPoint-Bold;
        src: url('fuentes/SulphurPoint-Bold.ttf')
    }
    </style>

</head>

<body style="font-family: SulphurPoint-Bold">
    <div id="app">
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
                    <h3><img src="img/usuario.png" width="40px" height="40px" alt=""> {{ Auth::user()->name }}</h3>
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a href="{{ route('subirreporte') }}" class="text-light"><img src="img/ingresar-informe.png"
                                width="35px" height="35px" alt=""> Subir Informe</a>
                    </li>
                    <li>
                        <a href="{{ route('listadoreportes') }}" class="text-light "><img src="img/informes.png"
                                width="35px" height="35px" alt=""> Lista de Informes</a>
                    </li>
                    <li>
                        <a href="{{ route('Cliente.index') }}" class="text-light "><img src="img/cliente.png"
                                width="35px" height="35px" alt=""> Cliente</a>
                    </li>
                    <li>
                        <a href="{{ route('Usuario.index') }}" class="text-light "><img src="img/usuarios.png"
                                width="35px" height="35px" alt=""> Usuario</a>
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
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
        }
    });
});
</script>
<script>
function revisarDigito( dvr )
{	
	dv = dvr + ""	
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
	{		
		alert("Debe ingresar un digito verificador valido");		
		window.document.form1.rut.focus();		
		window.document.form1.rut.select();		
		return false;	
	}	
	return true;
}

function revisarDigito2( crut )
{	
	largo = crut.length;	
	if ( largo < 2 )	
	{		
		alert("Debe ingresar el rut completo")		
		window.document.form1.rut.focus();		
		window.document.form1.rut.select();		
		return false;	
	}	
	if ( largo > 2 )		
		rut = crut.substring(0, largo - 1);	
	else		
		rut = crut.charAt(0);	
	dv = crut.charAt(largo-1);	
	revisarDigito( dv );	

	if ( rut == null || dv == null )
		return 0	

	var dvr = '0'	
	suma = 0	
	mul  = 2	

	for (i= rut.length -1 ; i >= 0; i--)	
	{	
		suma = suma + rut.charAt(i) * mul		
		if (mul == 7)			
			mul = 2		
		else    			
			mul++	
	}	
	res = suma % 11	
	if (res==1)		
		dvr = 'k'	
	else if (res==0)		
		dvr = '0'	
	else	
	{		
		dvi = 11-res		
		dvr = dvi + ""	
	}
	if ( dvr != dv.toLowerCase() )	
	{		
		alert("EL rut es incorrecto")		
		window.document.form1.rut.focus();		
		window.document.form1.rut.select();		
		return false	
	}

	return true
}

function Rut(texto)
{	
	var tmpstr = "";	
	for ( i=0; i < texto.length ; i++ )		
		if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
			tmpstr = tmpstr + texto.charAt(i);	
	texto = tmpstr;	
	largo = texto.length;	

	if ( largo < 2 )	
	{		
		alert("Debe ingresar el rut completo")		
		window.document.form1.rut.focus();		
		window.document.form1.rut.select();		
		return false;	
	}	

	for (i=0; i < largo ; i++ )	
	{			
		if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
 		{			
			alert("El valor ingresado no corresponde a un R.U.T valido");			
			window.document.form1.rut.focus();			
			window.document.form1.rut.select();			
			return false;		
		}	
	}	

	var invertido = "";	
	for ( i=(largo-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + texto.charAt(i);	
	var dtexto = "";	
	dtexto = dtexto + invertido.charAt(0);	
	dtexto = dtexto + '-';	
	cnt = 0;	

	for ( i=1,j=2; i<largo; i++,j++ )	
	{		
		//alert("i=[" + i + "] j=[" + j +"]" );		
		if ( cnt == 3 )		
		{			
			dtexto = dtexto + '.';			
			j++;			
			dtexto = dtexto + invertido.charAt(i);			
			cnt = 1;		
		}		
		else		
		{				
			dtexto = dtexto + invertido.charAt(i);			
			cnt++;		
		}	
	}	

	invertido = "";	
	for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + dtexto.charAt(i);	

	window.document.form1.rut.value = invertido.toUpperCase()		

	if ( revisarDigito2(texto) )		
		return true;	

	return false;
}

</script>

</html>