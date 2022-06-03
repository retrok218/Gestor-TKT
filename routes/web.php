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
Auth::routes();
Route::resource('roles', 'RoleController');

//Route::get('/', 'PostController@index')->name('home');

/*Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('posts', 'PostController');*/

  //Roles y Permisos
  Route::group(['prefix'=>'admin'],function ()
  {
      Route::group(['middleware' => ['permission:MenuRoles']], function() {
          //Route::get('/listar_roles', 'RoleController@listar_roles');
           Route::get('/listar_roles', 'AdminController@listar_roles');
          Route::get('/data_listar_roles', 'AdminController@data_listar_roles');
          Route::get('/roles/{id}/editar_roles_permisos', 'RoleController@editar_roles_permisos');
      });
  });


Route::post('/login', 'Auth\LoginController@login');
Route::get('/register/verify/{code}', 'Auth\LoginController@verify');
Route::post('/register', 'Auth\RegisterController@create')->name('create');
Route::post('/passReset', 'Auth\ResetPasswordController@resetPassword');
Route::get('/validator/{id}', 'Auth\RegisterController@validator')->name('validator');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/condTerminos', 'HomeController@condTerminos')->name('condTerminos');
Route::post('/passReset', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/passForgot', 'Auth\ForgotPasswordController@validateEmail')->name('passReset');
Route::post('/passUpdate', 'Auth\ForgotPasswordController@updatePass')->name('updatePass');
Route::get('/forgot/verify/{id}', 'Auth\ForgotPasswordController@validateTokenPassReset')->name('forgotPassW');
Route::get('/passModal', 'Auth\ForgotPasswordController@');


Route::get('/', function () {
    if (Auth::check()){
            if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('SuperAdmin')){
            return redirect('/admin');
            }
            else{
                return redirect('/home');
                }

        }else{
    return redirect('/login');
    }
    });

 //Usuarios
 //editar usuarios
    Route::group(['prefix' => 'users'], function() {
        Route::get('/profile', 'UserController@profile');
    Route::get('/index', 'UserController@index');
    Route::post('/updatePassword', 'UserController@updatePassword');
    Route::post('/validPassword', 'UserController@validPassword');
    Route::post('/validUser', 'Auth\RegisterController@validUser');
    Route::post('/validEmail', 'Auth\RegisterController@validEmail');
    Route::post('/editUser', 'UserController@editUser');
    });
 //Administrador
 Route::group(['middleware' => ['role:SuperAdmin']], function() {
  //editar usuarios
     Route::group(['prefix' => 'admin'], function() {
        Route::get('/', 'AdminController@dashboard');
      Route::get('/index', 'AdminController@index');
      Route::get('/listar_usuarios', 'AdminController@listar_usuarios');
     // Route::get('/listar_roles', 'AdminController@listar_roles');
      Route::get('/data_listar_usuarios', 'AdminController@data_listar_usuarios');
      Route::get('/data_listar_roles', 'AdminController@data_listar_roles');
      Route::get('/create', 'AdminController@create');
      Route::get('/edit', 'AdminController@edit');
      Route::post('/store', 'AdminController@store');
      Route::post('/update', 'AdminController@update');
     


     });
     Route::group(['prefix' => 'rol'], function() {
    });

   

 });
 Route::resource('files', 'FileController');
 //Route::get('/files/show', 'FileController@show');
/*Route::get('test', function() {
  dd(DB::connection()->getPdo());
});*/
Route::get('/block_screen', function () {
  return view('usuarios/block_screen');
});
Route::post('/block_screen', function () {
    return response()
    ->json(['status' => 'true']);
});
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'area'], function() {
  Route::get ('/tickets_abiertos','Estado_ticketsController@tickets_abiertos' );
 

});



Route::get ('/tickets_abiertos','Estado_ticketsController@tickets_abiertos');
Route::get('/data_tickets_abiertos','Estado_ticketsController@data_tickets_abiertos');



Route::get ('/tickets_asignados','Estado_ticketsController@tickets_asignados' );
Route::get ('/tickets_atendidos','Estado_ticketsController@tickets_atendidos' );
Route::get ('/tickets_cerrados_exitosamente','Estado_ticketsController@tickets_cerrados_exitosamente' );
Route::get ('/datatickets_cerrados_exitosamente','Estado_ticketsController@datatickets_cerrados_exitosamente' )->name('Cerradosdatos');


Route::get ('/tickets_cerradospt','Estado_ticketsController@tickets_abiertos' );
Route::get ('/tickets_espera_informacion','Estado_ticketsController@tickets_abiertos' );
Route::get ('/tickets_falta_acta_resp','Estado_ticketsController@tickets_abiertos' );
Route::get ('/tickets_notificado_al_usuario','Estado_ticketsController@tickets_abiertos' );
Route::get ('/tickets_pendientes','Estado_ticketsController@tickets_abiertos' );

Route::get ('/todos_los_tickets','Estado_ticketsController@todos_los_tkts' );
Route::get ('/datatodos_los_tickets','Estado_ticketsController@datatotodlosticket' );

