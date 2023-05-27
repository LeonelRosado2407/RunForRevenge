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


//preuba a ver que ta pasando 

Route::group(['middleware' => 'auth'], function(){

	
//rutas de las tablas 8 catalogos................
Route::get('/catalogos/skins/listado','SkinsController@listado')->middleware('candado2:SKINS');
Route::match(array('GET','POST'),'/catalogos/skins/formulario','SkinsController@formulario')->middleware('candado2:SKINS');
Route::post('/catalogos/skins/save','SkinsController@save');
Route::get('fotos/{nombre_foto}','SkinsController@mostrar_foto');

Route::get('/catalogos/tipopago/listado','TipopagoController@listado')->middleware('candado2:TIPOPAGO');
Route::match(array('GET','POST'),'/catalogos/tipopago/formulario','TipopagoController@formulario');
Route::post('/catalogos/tipopago/save','TipopagoController@save');

Route::get('/catalogos/status/listado','StatusController@listado')->middleware('candado2:STATUS');
Route::match(array('GET','POST'),'/catalogos/status/formulario','StatusController@formulario');
Route::post('/catalogos/status/save','StatusController@save');



//...Usuarios y sus catalogos.................................................

//Route::match(array('GET','POST'),'/buscador/user','UserController@listado');
Route::get('/catalogos/user/listado','UserController@listado')->middleware('candado2:USER');

Route::get('/catalogos/coins/listado','CoinsController@listado')->middleware('candado2:USER');

Route::get('/catalogos/wardrobe/listado','WardrobeController@listado')->middleware('candado2:USER');

Route::get('/catalogos/record/listado','RecordController@listado')->middleware('candado2:USER');

Route::get('/catalogos/orden/listado','OrdenController@listado');
Route::get('/catalogos/detalle/listado','Detalle_ordenController@listado')->middleware('candado2:USER');

Route::get('/catalogos/friends/listado','FriendsController@listado');








//...Usuarios y sus catalogos.................................................

Route::get('/catalogos/usuario/listado','UsuarioController@listado')->middleware('candado2:USUARIO');
Route::match(array('GET','POST'),'/catalogos/usuario/formulario','UsuarioController@formulario')->middleware('candado2:USUARIO');
Route::post('/catalogos/usuario/save','UsuarioController@save');
Route::get('fotos/{nombre_foto}','UsuarioController@mostrar_foto');

//rutas de las tablas 8 catalogos................


//---------rol------------------------

Route::get('/catalogos/rol/listado','RolController@listado')->middleware('candado2:ROL');
Route::match(array('GET','POST'),'/catalogos/rol/formulario','RolController@formulario')->middleware('candado2:ROL');
Route::post('/catalogos/rol/save','RolController@save');
//-------------------------------

//---------permisos----------------

Route::get('/catalogos/permiso/listado','PermisoController@listado')->middleware('candado2:ROL');
Route::match(array('GET','POST'),'/catalogos/permiso/formulario','PermisoController@formulario')->middleware('candado2:ROL');
Route::post('/catalogos/Permiso/save','PermisoController@save');

//----------------------------------
//-----------ROLxPERMISO------------
Route::get('/catalogos/rol/permiso','RolxpermisoController@formulario');
Route::post('/catalogos/rolxpermiso/save','RolxpermisoController@save');


//---perfil 

//Route::get('/admin/perfil','UsuarioController@perfil')->middleware('candado2:PERFIL');
//Route::get('fotos/{nombre_foto}','UsuarioController@mostrar_foto');

Route::get('/user/perfil','PerfilController@perfil')->middleware('candado2:PERFIL');
Route::post('/user/perfil/save','PerfilController@save');
Route::get('fotos/{nombre_foto}','PerfilController@mostrar_foto');


Route::get('/tienda','TiendaController@listado');
Route::get('fotos/{nombre_foto}','TiendaController@mostrar_foto');

Route::get('/catalogos/solicitudes','SolicitudController@listado');
// Route::get('/catalogos/solicitudes/solicitud','SolicitudController@aceptarsolicitud');
Route::match(array('Get','Post'),'/catalogos/solicitudes/solicitud','PerfilController@aceptarsolicitud');
Route::match(array('Get','Post'),'/Buscador/jugadores','SolicitudController@buscador');
Route::match(array('Get','Post'),'/Buscador/jugadores/solicitud','SolicitudController@solicitud');


});












Route::get('/Home', 'HomeController@Top_Global');

Route::get('/prueba','PruebaController@aver');

//faker
Route::get('/dbup/user','DbUpController@user');
Route::get('/dbup/orden','DbUpController@orden');
Route::get('/dbup/detalle','DbUpController@detalle');
Route::get('/dbup/record','DbUpController@record');
Route::get('/dbup/amigos','DbUpController@amigos');
Route::get('/dbup/wardrobe','DbUpController@wardrobe');



Route::get('/sinpermiso', function(){

	dd('NO TIENE PERMISO');
});

//.......................Segurida.....................

//---autoregistro

Route::get('/registrate',function(){
	return view('auth.registro_visita');
});

Route::get('/visitante/bienvenido','VisitaController@perfil');

//---login
Route::get('/manage','Auth\LoginController@showLoginForm')->name('login');
Route::get('/','Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login');

//----register/registro

Route::get('/usuario/registro','Auth\RegisterController@formulario_registro');
Route::post('/usuario/registro/save','Auth\RegisterController@register');


//---- solicitud

Route::get('/home2','Home2Controller@listado');


//pago targeta

Route::match(array('GET','POST'),'/verificar/compra','CompraController@vcompra');
//Route::get('/verificar/compra','CompraController@vcompra');
Route::get('fotos/{nombre_foto}','CompraController@mostrar_foto');


//Route::match(array('GET','POST'),'/pagos/procesar','CompraController@realizar_pago');
Route::post('/pagos/procesar','CompraController@realizar_pago');

































