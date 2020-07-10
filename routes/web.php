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
    Route::get('/Projects/View',[
        'uses'=>'ProjectsController@view',
        'as'=>'projects.view'
    ]);
    Route::get('/Projects/Index',[
        'uses'=>'JobsController@index',
        'as'=>'jobs'
    ]);
    Route::get('/Projects/Completed',[
        'uses'=>'ProjectsController@completed',
        'as'=>'projects.completed'
    ]);
    Route::get('/Job/Id/{projectId}',[
        'uses'=>'ProjectsController@show',
        'as'=>'singleProject'
    ]);
    Route::get('/Suspend/Bids/{slug}',[
        'uses'=>'ProjectsController@close',
        'as'=>'close'
    ]);
    Route::get('/Complete/Project/{slug}',[
        'uses'=>'ProjectsController@complete',
        'as'=>'complete'
    ]);
    Route::get('/Submit/Proposal/{projectId}',[
        'uses'=>'JobsController@Proposal',
        'as'=>'proposalPost'
    ]);
    Route::get('/Job/Views/{projectId}',[
        'uses'=>'JobsController@show',
        'as'=>'singleJob'
    ]);
    Route::post('/Project/Post',[
        'uses'=>'ProjectsController@store',
        'as'=>'project.bpost'
    ]);
    Route::post('/Project/Proposal/{Id}',[
        'uses'=>'ProposalsController@store',
        'as'=>'proposal.post'
    ]);
    Route::get('/Proposed/Jobs',[
        'uses'=>'ProposalsController@proposed',
        'as'=>'proposed'
    ]);
    Route::get('/Proposal/Retract/{ProjectId}',[
        'uses'=>'ProposalsController@retract',
        'as'=>'retract'
    ]);
    Route::get('/Message/Project/{ProjectId}/{UserId}',[
        'uses'=>'MessagesController@index',
        'as'=>'message'
    ]);
    Route::post('/Messages/{UserId}/{ProjectId}',[
        'uses'=>'MessagesController@store',
        'as'=>'message.post'
    ]);
});