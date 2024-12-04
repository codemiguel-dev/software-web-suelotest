<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RegisterpdfController;
use App\Http\Controllers\ListadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('inicio');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ruta de reporte usuario cliente
Route::get('/reporte',[RegisterpdfController::class, 'index'])->name('reporte');
Route::get('/listadoreportes',[ListadoController::class,'index'])->name('listadoreportesusuario');
Route::post('/EnvioDatos',[RegisterpdfController::class,'Insertar'])->name('envioinformeusuario');
Route::get('listadoreportes/{id}',[ListadoController::class,'descargar'])->name('descargarinforme');

//ruta del admin
Route::get('/admin', [AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');
Route::get('admin/listadoreportes',[AdminController::class, 'listainforme'])
->middleware('auth.admin')
->name('listadoreportes');
Route::get('showdocumento/{id}',[AdminController::class, 'show'])
->middleware('auth.admin')
->name('Documento.show');
Route::delete('destroydocumento/{id}',[AdminController::class, 'destroy'])
->middleware('auth.admin')
->name('Documento.destroy');
Route::get('admin/subirreporte',[RegisterpdfController::class, 'redirecionarsubirreporte'])
->middleware('auth.admin')
->name('subirreporte');
Route::post('admin/EnvioDatosadmin',[RegisterpdfController::class,'Insertarinformeadmin'])
->name('envioinformeadmin');

//Cliente.index viene del controlador donde index es la función de inicio
Route::get('admin/cliente',[ClienteController::class, 'index'])
->middleware('auth.admin')
->name('Cliente.index');
Route::get('createcliente',[ClienteController::class, 'create'])
->middleware('auth.admin')
->name('Cliente.create');
Route::post('storecliente',[ClienteController::class, 'store'])
->middleware('auth.admin')
->name('Cliente.store');
Route::get('editcliente/{id}',[ClienteController::class, 'edit'])
->middleware('auth.admin')
->name('Cliente.edit');
Route::put('updatecliente/{id}',[ClienteController::class, 'update'])
->middleware('auth.admin')
->name('Cliente.update');
Route::get('showcliente/{id}',[ClienteController::class, 'show'])
->middleware('auth.admin')
->name('Cliente.show');
Route::delete('destroycliente/{id}',[ClienteController::class, 'destroy'])
->middleware('auth.admin')
->name('Cliente.destroy');

//Usuario.index viene del controlador donde index es la función de inicio
Route::get('admin/usuario',[UserController::class, 'index'])
->middleware('auth.admin')
->name('Usuario.index');
Route::get('admin/createusuario',[UserController::class, 'create'])
->middleware('auth.admin')
->name('Usuario.create');
Route::post('storeusuario',[UserController::class, 'store'])
->middleware('auth.admin')
->name('Usuario.store');
Route::get('editusuario/{id}',[UserController::class, 'edit'])
->middleware('auth.admin')
->name('Usuario.edit');
Route::put('updateusuario/{id}',[UserController::class, 'update'])
->middleware('auth.admin')
->name('Usuario.update');
Route::get('showusuario/{id}',[UserController::class, 'show'])
->middleware('auth.admin')
->name('Usuario.show');
Route::delete('destroyusuario/{id}',[UserController::class, 'destroy'])
->middleware('auth.admin')
->name('Usuario.destroy');

Route::get('traerusuario/{id}',[UserController::class, 'traerid'])
->middleware('auth.admin')
->name('Usuario.traerid');

Route::get('/send-mail',[MailController::class, 'sendMail'])
->middleware('auth.admin')
->name('send-mail');

