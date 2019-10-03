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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportarController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//PARA TODO LOS DE vUE
Route::get('/clientes', 'ClientesController@home')->name('clientes.home');
Route::get('/clientes/index', 'ClientesController@index');
Route::post('/clientes/registrar', 'ClientesController@store');
Route::post('/clientes/actualizar', 'ClientesController@update');
Route::post('/clientes/desactivar', 'ClientesController@desactivar');
Route::post('/clientes/activar', 'ClientesController@activar');



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    $routes = [
        ['module' => 'customers', 'controller' => 'CustomerController'],
        ['module' => 'products', 'controller' => 'ProductController'],
        ['module' => 'categories', 'controller' => 'CategoryController'],
        ['module' => 'tags', 'controller' => 'TagController'],
        ['module' => 'orders', 'controller' => 'OrderController'],
        ['module' => 'payment-methods', 'controller' => 'PaymentMethodController'],
        ['module' => 'user', 'controller' => 'UserController'],
        ['module' => 'role', 'controller' => 'RoleController'],
        ['module' => 'permission', 'controller' => 'PermissionController'],
        ['module' => 'usuarios', 'controller' => 'UsuariosController'],
        ['module' => 'grados', 'controller' => 'GradosController'],
        ['module' => 'carreras', 'controller' => 'CarrerasController'],
        ['module' => 'paises', 'controller' => 'PaisesController'],
        ['module' => 'escuelas', 'controller' => 'EscuelasController'],
        ['module' => 'titulos', 'controller' => 'TitulosController'],
        ['module' => 'idiomas', 'controller' => 'IdiomasController'],
        ['module' => 'direccionesgenerales', 'controller' => 'DireccionesGeneralesController'],
        ['module' => 'direccionesareas', 'controller' => 'DireccionesAreasController'],
        ['module' => 'codigos', 'controller' => 'CodigosController'],
        ['module' => 'niveles', 'controller' => 'NivelesController'],
        ['module' => 'estadocivil', 'controller' => 'EstadoCivilController'],
    ];

    foreach ($routes as $route) {
        Route::group(['prefix' => $route['module']], function () use ($route) {
            Route::get('/', "{$route['controller']}@index")->middleware("permission:read-{$route['module']}")->name("{$route['module']}.index");
            Route::get('/lista', "{$route['controller']}@listaAdmin")->middleware("permission:read-usuariosAdmin")->name("{$route['module']}.indexLista");
            Route::get('/json', "{$route['controller']}@json")->middleware("permission:read-{$route['module']}")->name("{$route['module']}.json");
            Route::get('/json/admin', "{$route['controller']}@jsonAdmin")->middleware("permission:read-usuariosAdmin")->name("{$route['module']}.jsonAdmin");
            Route::get('/create', "{$route['controller']}@create")->middleware("permission:create-{$route['module']}")->name("{$route['module']}.create");
            Route::post('/store', "{$route['controller']}@store")->middleware("permission:create-{$route['module']}")->name("{$route['module']}.store");
            Route::get('/edit/{id}', "{$route['controller']}@edit")->middleware("permission:update-{$route['module']}")->name("{$route['module']}.edit");
            Route::post('/update/{id}', "{$route['controller']}@update")->middleware("permission:update-{$route['module']}")->name("{$route['module']}.update");
            Route::delete('/destroy/{id}', "{$route['controller']}@destroy")->middleware("permission:delete-{$route['module']}")->name("{$route['module']}.destroy");


            Route::get('/cards', 'UsuariosController@cards')->name('cards');
            Route::get('/card/action', 'UsuariosController@cardsAction')->name('card.action');
            // Route::get('/show/{id}', 'UsuariosController@show')->name('show');
            Route::get('/show/{id}', "{$route['controller']}@show")->middleware("permission:show-{$route['module']}")->name("{$route['module']}.show");

            Route::get('/desactivar/{id}', "{$route['controller']}@desactivar")->middleware("permission:desactivar-{$route['module']}")->name("{$route['module']}.desactivar");
            Route::get('/activar/{id}', "{$route['controller']}@activar")->middleware("permission:activar-{$route['module']}")->name("{$route['module']}.activar");





            //estados
            Route::get('/estados/{id}', 'UsuariosController@estados');
             //colonias
             Route::get('/municipios/{id}', 'UsuariosController@municipios');
             Route::get('/colonias/{id}', 'UsuariosController@colonias');
             Route::get('/cp/{id}', 'UsuariosController@cp');

        });
    }

    //temporal show
    Route::get('/show2/{id}', "UsuariosController@show2")->name("show2");


    Route::get('/charts', 'ChartController@index')->middleware('permission:read-charts');

        //exportar
        Route::get('/usuarios/index-exportar', 'UsuariosController@indexExportar')->name('usuarios.index-exportar');
        Route::get('/usuarios/exportar', 'UsuariosController@exportar')->name('usuarios.exportar');
        //exportar cvs
        Route::get('/usuarios/exportar-excel', 'UsuariosController@exportarExcel')->name('usuarios.exportar-excel');

        //exportar pdf
        Route::get('/usuarios-pdf/{id}', 'UsuariosController@expPdf')->name('usuarios.pdf');

        //email
        // Route::get('/sendemail', 'UsuariosController@enviarEmail')->name('send.email');

        //EXPORTAR3
        Route::get('/usuarios/index-exportar3', 'UsuariosController@index_exp')->name('usuarios.index-exportar3');
        Route::get('/usuarios/exportar3', 'UsuariosController@usuarios_expp')->name('usuarios_exp');



    //importar
    Route::get('/importar','ImportarController@importar');



    //importaciones de Catalogos
    Route::get('/importar/pais', 'PaisesController@cargarPais')->name('paises.indexx');
    Route::post('/importar/pais/ejecutar', 'PaisesController@importarPais')->name('import.pais');

    Route::get('/importar/carreras', 'CarrerasController@cargarCarrera')->name('carreras.indexx');
    Route::post('/importar/carreras/ejecutar', 'CarrerasController@importarCarrera')->name('import.carreras');
    Route::get('/importar/escuelas', 'EscuelasController@cargarEscuelas')->name('escuelas.indexx');
    Route::post('/importar/escuelas/ejecutar', 'EscuelasController@importarEscuelas')->name('import.escuelas');
    Route::get('/importar/permission', 'PermissionController@cargarPermission')->name('permission.indexx');
    Route::post('/importar/permission/ejecutar', 'PermissionController@importarPermission')->name('import.permission');
    Route::get('/importar/grados', 'GradosController@cargarGrados')->name('grados.indexx');
    Route::post('/importar/grados/ejecutar', 'GradosController@importarGrados')->name('import.grados');
    Route::get('/importar/titulos', 'TitulosController@cargarTitulos')->name('titulos.indexx');
    Route::post('/importar/titulos/ejecutar', 'TitulosController@importarTitulos')->name('import.titulos');
    Route::get('/importar/idiomas', 'IdiomasController@cargarIdiomas')->name('idiomas.indexx');
    Route::post('/importar/idiomas/ejecutar', 'IdiomasController@importarIdiomas')->name('import.idiomas');
    Route::get('/importar/direccionesgenerales', 'DireccionesGeneralesController@cargarDireccionesGenerales')->name('direccionesgenerales.indexx');
    Route::post('/importar/direccionesgenerales/ejecutar', 'DireccionesGeneralesController@importarDireccionesGenerales')->name('import.direccionesgenerales');
    Route::get('/importar/direccionesareas', 'DireccionesAreasController@cargarDireccionesAreas')->name('direccionesareas.indexx');
    Route::post('/importar/direccionesareas/ejecutar', 'DireccionesAreasController@importarDireccionesAreas')->name('import.direccionesareas');
    Route::get('/importar/codigos', 'CodigosController@cargarCodigos')->name('codigos.indexx');
    Route::post('/importar/codigos/ejecutar', 'CodigosController@importarCodigos')->name('import.codigos');
    Route::get('/importar/niveles', 'NivelesController@cargarNiveles')->name('niveles.indexx');
    Route::post('/importar/niveles/ejecutar', 'NivelesController@importarNiveles')->name('import.niveles');
    Route::get('/importar/estadocivil', 'EstadoCivilController@cargarEstadoCivil')->name('estadocivil.indexx');
    Route::post('/importar/estadocivil/ejecutar', 'EstadoCivilController@importarEstadoCivil')->name('import.estadocivil');
    Route::get('/importar/user', 'UserController@cargarUser')->name('user.indexx');
    Route::post('/importar/user/ejecutar', 'UserController@importarUser')->name('import.user');
    Route::get('/user/alta', 'UserController@alta')->name('alta.user');




});


