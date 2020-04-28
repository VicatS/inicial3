<?php


use App\Models\Security\Permission;
use App\Models\Security\Role;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {

//    return Permission::create([
//        'name' => 'Listado de Permisos',
//        'slug' => 'listado-de-permisos',
//        'description' => 'Ver listado de Permisos'
//    ]);

//    return Permission::all();
    $role = Role::find(1);

    $role->permissions()->sync([1,2,3,4]);

    return $role->permissions;

});
