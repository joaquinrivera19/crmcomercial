<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
|
*/
Route::get('lsdyhlyjctslc4qs067u/{conce}/{campania}/{usuario}/{sistema}', 'ReciboController@getrecibo');

Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'Auth\AuthController@index');
    Route::auth();

    Route::get('/login', 'Auth\AuthController@index');

    Route::get('/home', 'HomeController@index');

    Route::resource('agenda', 'PlanillaAgendaController');

    Route::get('/prospectos', 'FormController@index');

    Route::get('/prospectos_data', 'FormController@listado_data');

    Route::get('/prospectos_potenciales', 'FormCliPotencialesController@index');

    Route::get('/prospectos_potenciales_data', 'FormCliPotencialesController@listado_data');

    Route::resource('form', 'FormController', ['only' => ['create', 'store', 'edit', 'update', 'show']]);

    Route::resource('form_clipotenciales', 'FormCliPotencialesController', ['only' => ['create', 'store', 'edit', 'update', 'show']]);

    Route::get('form_clipotenciales/clipot/{id}', 'FormCliPotencialesController@getClientesPotenciales');

    Route::resource('concespotenciales', 'ConcesPotencialesController');

    Route::resource('campania', 'CampaniaController');

    Route::resource('concesconsultoria', 'ConcesConsultoriaController');

    Route::resource('campaniamkt', 'CampaniamktController');

    Route::get('campaniamkt_actualizar', 'CampaniamktController@subir');

    Route::resource('getcampaniamkt_resultado', 'CampaniamktController@getcampaniamkt_resultado');

    Route::get('/campaniamkt_resultado', 'CampaniamktController@campaniamkt_resultado');

    Route::resource('producto', 'ProductoController');

    Route::resource('vendedor', 'VendedorController');

    Route::resource('tipoorigen','TipoOrigenController');

    Route::resource('categoria','CategoriaController');

    Route::resource('modcontacto','ModContactoController');

    Route::resource('sistemas', 'SistemaController');

    Route::resource('actividad', 'ActividadController');

    Route::get('autocomplete', [
        'as' => 'autocomplete',
        'uses' => 'FormController@autocompleteConces']);

    Route::get('autocompleteCliPot', [
        'as' => 'autocompleteCliPot',
        'uses' => 'FormCliPotencialesController@autocompleteConces']);

    Route::get('form/productos/{clase}', 'ProductoController@getProductos');

    Route::get('form_clipotenciales/provincias/{pais}', 'ProvinciaController@getProvincias');

    Route::get('form/{id}/productos/{clase}', 'ProductoController@getProductosEditProsp');

    Route::get('form_clipotenciales/categorias', 'CategoriaController@getCategorias');

    Route::get('form/{id}/editProspecto', 'FormController@editProspecto');

    Route::get('form_clipotenciales/{id}/editProspecto', 'FormCliPotencialesController@editProspecto');

    Route::get('adjunto', [
        'as' => 'adjunto',
        'uses' => 'FormController@getAdjuntos']);

    Route::get('localidades', [
        'as' => 'localidades',
        'uses' => 'LocalidadController@getLocalidad'
    ]);

    Route::get('provincia', [
        'as' => 'provincia',
        'uses' => 'ProvinciaController@getProvinciass'
    ]);

    Route::get('marcas', 'MarcaController@getMarcas');
    
    Route::post('fecfac', 'FormCliPotencialesController@changefecfact');
    Route::post('fecfacconsult', 'FormController@changefecfact');

//      Te trae todas los registros del modelo ProspectoCliPot
//
//    Route::get('prueba', function () {
//        return crmcomercial\Entities\ProspectoCliPot::all();
//    });
//
//      Te trar todos los registros del controllador cuando en el controller pones return $prospectoclipot
//
//    Route::get('/prospectos_potenciales', 'FormCliPotencialesController@index');

});



