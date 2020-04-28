<?php

use App\Models\Role;
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

Route::get('/test', function () {

//    return Role::create([
//        'name' => 'Test',
//        'slug' => 'test',
//        'description' => 'Encardago del testing',
//        'full_access' => 'no'
//    ]);

    $user = User::find(1);
    $user->roles()->sync([1]);

    return $user->roles;

});
