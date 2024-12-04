@extends('layouts.app')

@section('content')
<style>
button {
    background-color: #007bff;
}

@font-face {
    font-family: SulphurPoint;
    src: url('fuentes/SulphurPoint-Bold.ttf')
}
</style>
<div class="Section_top" style="font-family: SulphurPoint;">
    <div class="content">
        <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">
                    <div class="col-12">
                        <img src="img/suelotest-logo-corto.png" alt="">
                    </div>
                    <form class="col-12" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group" id="user-group">
                            <input type="email" class="form-control" placeholder="Correo" name="email" required />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group" id="contrasena-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Contraseña" name="password" required autocomplete="current-password" />

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Ingresar
                        </button>
                    </form>
                    <!--
                <div class="col-12 forgot">
                    <a href="#">Recordar contrasena?</a>
                </div>
                <div th:if="${param.error}" class="alert alert-danger" role="alert">
		            Invalid username and password.
		        </div>
		        <div th:if="${param.logout}" class="alert alert-success" role="alert">
		            You have been logged out.
		        </div>
                -->
                </div>
            </div>
        </div>
        <div class="text-center">
            <img id="logo-boxapp" src="img/logo-boxapp.png" alt="">
        </div>
    </div>
</div>
@endsection