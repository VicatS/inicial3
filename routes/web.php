<?php


use App\Models\Security\Permission;
use App\Models\Security\Role;
use App\User;
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

Route::group(['namespace' => 'Security'], function () {
    Route::resource('/role', 'RoleController')->names('role');
    Route::resource('/user', 'UserController', ['except' => [
        'create',
        'store']
    ])->names('user');
});

Route::get('/test', function () {
    $user = User::find(2);

//    $user->roles()->sync([2]);
    Gate::authorize('haveaccess', 'role.show');
    return $user;
//    return $user->havePermission('role.create');
});

Route::get('/test', function () {
    $user = User::find(2);

//    $user->roles()->sync([2]);
    Gate::authorize('haveaccess', 'role.show');
    return $user;
//    return $user->havePermission('role.create');
});



