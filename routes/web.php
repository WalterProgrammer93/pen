<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('auth.login');

    /*$user = Auth::user();

    if ($user->administrador()) {
        return view('welcome');
    } else {
        return view('auth.login');
    }

    if ($user->estudiante()) {
        echo 'eres estudiante';
    } else {
        return view('auth.login');
    }

    if ($user->profesor()) {
        echo 'eres profesor';
    } else {
        return view('auth.login');
    }

    if ($user->invitado()) {
        echo 'eres invitado';
    } else {
        return view('auth.login');
    }

    return view('auth.login');*/

    /*if(!Auth::guest()) {

        if(Auth::user()->perfil->rol == 'administrador') {

            return view('home');
        }
        if(Auth::user()->perfil->rol == 'estudiante') {

            return view('home_estudiante');
        }
        if(Auth::user()->perfil->rol == 'profesor') {

            return view('home_profesor');
        }
        if(Auth::user()->perfil->rol == 'invitado') {

            return view('home_invitado');
        }

    }else
        return view('auth.login');*/
});

Auth::routes();

Route::get('/home', [
	'middleware' => 'auth',
	'before' => 'crsf',
	'uses' => 'HomeController@index']);

// ACCESO A LAS RUTAS DE ALUMNOS
/* Leer */
Route::get('alumnos', 'AlumnoController@index')->name('alumnos');

/* Crear */
Route::post('alumnos/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AlumnoController@create'])->name('alumnos/crear');

Route::put('alumnos/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AlumnoController@store'])->name('alumnos/store');

/* Actualizar */
Route::get('alumnos/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AlumnoController@actualizar'])->name('alumnos/actualizar');

Route::put('alumnos/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AlumnoController@update'])->name('alumnos/update');

/* Eliminar */
Route::put('alumnos/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AlumnoController@eliminar'])->name('alumnos/eliminar');

/* Buscar */
Route::post('alumnos/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AlumnoController@buscar'])->name('alumnos/buscar');

// ACCESO A LAS RUTAS DE CURSOS
/* Leer */
Route::get('cursos', 'CursoController@index')->name('cursos');

/* Crear */
Route::post('cursos/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CursoController@create'])->name('cursos/crear');

Route::put('cursos/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CursoController@store'])->name('cursos/store');

/* Actualizar */
Route::get('cursos/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CursoController@actualizar'])->name('cursos/actualizar');

Route::put('cursos/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'CursoController@update'])->name('cursos/update');

/* Eliminar */
Route::put('cursos/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'CursoController@eliminar'])->name('cursos/eliminar');

/* Buscar */
Route::post('cursos/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CursoController@buscar'])->name('cursos/buscar');

// ACCESO A LAS RUTAS DE ASIGNATURAS
/* Leer */
Route::get('asignaturas', 'AsignaturaController@index')->name('asignaturas');

/* Crear */
Route::post('asignaturas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsignaturaController@create'])->name('asignaturas/crear');

Route::put('asignaturas/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsignaturaController@store'])->name('asignaturas/store');

/* Actualizar */
Route::get('asignatura/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsignaturaController@actualizar'])->name('asignaturas/actualizar');

Route::put('asignatura/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AsignaturaController@update'])->name('asignaturas/update');

/* Eliminar */
Route::put('asignaturas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AsignaturaController@eliminar'])->name('asignaturas/eliminar');

/* Buscar */
Route::post('asignaturas/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsignaturaController@buscar'])->name('asignaturas/buscar');


// ACCESO A LAS RUTAS DE ASISTENCIAS
/* Leer */
Route::get('asistencias', 'AsistenciaController@index')->name('asistencias');

/* Crear */
Route::post('asistencias/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsistenciaController@create'])->name('asistencias/crear');

Route::put('asistencias/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsistenciaController@store'])->name('asistencias/store');

/* Actualizar */
Route::get('asistencias/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsistenciaController@actualizar'])->name('asistencias/actualizar');

Route::put('asistencias/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AsistenciaController@update'])->name('asistencias/update');

/* Eliminar */
Route::put('asistencias/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AsistenciaController@eliminar'])->name('asistencias/eliminar');

/* Buscar */
Route::post('asistencias/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsistenciaController@buscar'])->name('asistencias/buscar');


// ACCESO A LAS RUTAS DE PROFESORES
/* Leer */
Route::get('profesores', 'ProfesorController@index')->name('profesores');

/* Crear */
Route::post('profesores/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ProfesorController@create'])->name('profesores/crear');

Route::put('profesores/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ProfesorController@store'])->name('profesores/store');

/* Actualizar */
Route::get('profesores/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ProfesorController@actualizar'])->name('profesores/actualizar');

Route::put('profesores/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ProfesorController@update'])->name('profesores/update');

/* Eliminar */
Route::put('profesores/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ProfesorController@eliminar'])->name('profesores/eliminar');

/* Buscar */
Route::post('profesores/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ProfesorController@buscar'])->name('profesores/buscar');

// ACCESO A LAS RUTAS DE USUARIOS

/* Leer */
Route::get('usuarios', 'UsuarioController@index')->name('usuarios');

/* Crear */
Route::post('usuarios/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'UsuarioController@create'])->name('usuarios/crear');

Route::put('usuarios/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'UsuarioController@store'])->name('usuarios/store');

/* Actualizar */
Route::get('usuarios/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'UsuarioController@actualizar'])->name('usuarios/actualizar');

Route::put('usuarios/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'UsuarioController@update'])->name('usuarios/update');

/* Eliminar */
Route::put('usuarios/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'UsuarioController@eliminar'])->name('usuarios/eliminar');

/* Buscar */
Route::post('usuarios/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'UsuarioController@buscar'])->name('usuarios/buscar');

// ACCESSO A RUTAS DE NOTAS
/* Leer */
Route::get('notas', 'NotaController@index')->name('notas');

/* Crear */
Route::post('notas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'NotaController@create'])->name('notas/crear');

Route::put('notas/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'NotaController@store'])->name('notas/store');

/* Actualizar */
Route::get('notas/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'NotaController@actualizar'])->name('notas/actualizar');

Route::put('notas/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'NotaController@update'])->name('notas/update');

/* Eliminar */
Route::put('notas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'NotaController@eliminar'])->name('notas/eliminar');

/* Buscar */
Route::post('notas/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'NotaController@buscar'])->name('notas/buscar');

// ACCESO A LAS RUTAS DE DEPARTAMENTOS
/* Leer */
Route::get('departamentos', 'DepartamentoController@index')->name('departamentos');

/* Crear */
Route::post('departamentos/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'DepartamentoController@create'])->name('departamentos/crear');

Route::put('departamentos/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'DepartamentoController@store'])->name('departamentos/store');

/* Actualizar */
Route::get('departamentos/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'DepartamentoController@actualizar'])->name('departamentos/actualizar');

Route::put('departamentos/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'DepartamentoController@update'])->name('departamentos/update');

/* Eliminar */
Route::put('departamentos/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'DepartamentoController@eliminar'])->name('departamentos/eliminar');

/* Buscar */
Route::post('departamentos/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'DepartamentoController@buscar'])->name('departamentos/buscar');


// ACCESO A LAS RUTAS DE AULAS
/* Leer */
Route::get('aulas', 'AulaController@index')->name('aulas');

/* Crear */
Route::post('aulas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AulaController@create'])->name('aulas/crear');

Route::put('aulas/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AulaController@store'])->name('aulas/store');

/* Actualizar */
Route::get('aulas/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AulaController@actualizar'])->name('aulas/actualizar');

Route::put('aulas/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AulaController@update'])->name('aulas/update');

/* Eliminar */
Route::put('aulas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AulaController@eliminar'])->name('aulas/eliminar');

/* Buscar */
Route::post('aulas/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AulaController@buscar'])->name('aulas/buscar');

// ACCESO A LAS RUTAS DE EVENTOS
/* Leer */
Route::get('eventos', 'EventoController@index')->name('eventos');

/* Crear */
Route::post('eventos/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'EventoController@create'])->name('eventos/crear');

Route::put('eventos/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'EventoController@store'])->name('eventos/store');

/* Actualizar */
Route::get('eventos/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'EventoController@actualizar'])->name('eventos/actualizar');

Route::put('eventos/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'EventoController@update'])->name('eventos/update');

/* Eliminar */
Route::put('eventos/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'EventoController@eliminar'])->name('eventos/eliminar');

/* Buscar */
Route::post('eventos/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'EventoController@buscar'])->name('eventos/buscar');

// ACCESO A LAS RUTAS DE TAREAS
/* Leer */
Route::get('tareas', 'TareaController@index')->name('tareas');

/* Crear */
Route::post('tareas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TareaController@create'])->name('tareas/crear');

Route::put('tareas/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TareaController@store'])->name('tareas/store');

/* Actualizar */
Route::get('tareas/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TareaController@actualizar'])->name('tareas/actualizar');

Route::put('tareas/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'TareaController@update'])->name('tareas/update');

/* Eliminar */
Route::put('tareas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'TareaController@eliminar'])->name('tareas/eliminar');

/* Buscar */
Route::post('tareas/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TareaController@buscar'])->name('tareas/buscar');


// ACCESO A LAS RUTAS DE TEMAS
/* Leer */
Route::get('temas', 'TemaController@index')->name('temas');

/* Crear */
Route::post('temas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TemaController@create'])->name('temas/crear');

Route::put('temas/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TemaController@store'])->name('temas/store');

/* Actualizar */
Route::get('temas/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TemaController@actualizar'])->name('temas/actualizar');

Route::put('temas/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'TemaController@update'])->name('temas/update');

/* Eliminar */
Route::put('temas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'TemaController@eliminar'])->name('temas/eliminar');

/* Buscar */
Route::post('temas/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TemaController@buscar'])->name('temas/buscar');

// ACCESO A LAS RUTAS DE RESERVAS
/* Leer */
Route::get('reservas', 'ReservaController@index')->name('reservas');

/* Crear */
Route::post('reservas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ReservaController@create'])->name('reservas/crear');

Route::put('reservas/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ReservaController@store'])->name('reservas/store');

/* Actualizar */
Route::get('reservas/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ReservaController@actualizar'])->name('reservas/actualizar');

Route::put('reservas/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ReservaController@update'])->name('reservas/update');

/* Eliminar */
Route::put('reservas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ReservaController@eliminar'])->name('reservas/eliminar');

/* Buscar */
Route::post('reservas/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ReservaController@buscar'])->name('reservas/buscar');


// ACCESO A LAS RUTAS DE CONVALIDACIONES
/* Leer */
Route::get('convalidaciones', 'ConvalidacionController@index')->name('convalidaciones');

/* Crear */
Route::post('convalidaciones/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ConvalidacionController@create'])->name('convalidaciones/crear');

Route::put('convalidaciones/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ConvalidacionController@store'])->name('convalidaciones/store');

/* Actualizar */
Route::get('convalidaciones/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ConvalidacionController@actualizar'])->name('convalidaciones/actualizar');

Route::put('convalidaciones/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ConvalidacionController@update'])->name('convalidaciones/update');

/* Eliminar */
Route::put('convalidaciones/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ConvalidacionController@eliminar'])->name('convalidaciones/eliminar');

/* Buscar */
Route::post('convalidaciones/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ConvalidacionController@buscar'])->name('convalidaciones/buscar');

// RUTAS DE ACCESO A DESARROLLOS

/* Leer */
Route::get('clases', 'ClaseController@index')->name('clases');

/* Crear */
Route::post('clases/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ClaseController@create'])->name('clases/crear');

Route::put('clases/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ClaseController@store'])->name('clases/store');

/* Actualizar */
Route::get('clases/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ClaseController@actualizar'])->name('clases/actualizar');

Route::put('clases/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ClaseController@update'])->name('clases/update');

/* Eliminar */
Route::put('clases/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ClaseController@eliminar'])->name('clases/eliminar');

/* Buscar */
Route::post('clases/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ClaseController@buscar'])->name('clases/buscar');

// ACCESO A RUTAS DE PERFILES

/* Leer */
Route::get('perfiles', 'PerfilController@index')->name('perfiles');

/* Crear */
Route::post('perfiles/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'PerfilController@create'])->name('perfiles/crear');

Route::put('perfiles/store', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'PerfilController@store'])->name('perfiles/store');

/* Actualizar */
Route::get('perfiles/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'PerfilController@actualizar'])->name('perfiles/actualizar');

Route::put('prefiles/update/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'PerfilController@update'])->name('prefiles/update');

/* Eliminar */
Route::put('prefiles/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'PerfilController@eliminar'])->name('prefiles/eliminar');

/* Buscar */
Route::post('perfiles/buscar/{nombre}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'PerfilController@buscar'])->name('perfiles/buscar');

// RUTA DE ENVIO DE EMAL PARA RESTAURAR LA CONTRASEÑA DE USUARIO

Route::get('enviar', ['as' => 'enviar', function () {

    $data = ['link' => 'http://http://localhost/pen/public/password/reset'];

    \Mail::send('emails.notificacion', $data, function ($message) {

        $message->from('walter12@gmail.com', 'pen.software.app');

        $message->to('co2full@outlook.es')->subject('Notificación');

    });

    return "Se envío el email";
}]);
