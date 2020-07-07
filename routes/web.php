<?php

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

Route::get('/',[
    'uses'=>'IndexController@index',
    'as'=>'index'
]);

Auth::routes();

Route::get('/Dashboard/Index', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/Account/Index',[
        'uses'=>'ProfileController@index',
        'as'=>'account'
    ]);
    Route::get('/Post/Project',[
        'uses'=>'ProjectsController@create',
        'as'=>'projects.add'
    ]);
    Route::post('/Project/Post',[
        'uses'=>'ProjectsController@store',
        'as'=>'project.bpost'
    ]);
});