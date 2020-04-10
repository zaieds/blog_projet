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
    return view('welcome');
});

Route::get('contact', 'ContactController@create');
Route::post('contact', 'ContactController@store');

Route::get('/', 'HomeController@index');
Route::get('user', 'UserController@getInfos');
Route::post('user', 'UserController@postInfos');

//Route::get('contact', 'ContactController@index');
Route::get('article', 'PostsController@index');

Route::get('/articles/{post_name}', 'PostsController@show')->name("article_show");


/*

;
/*Route::resource('user', 'AdminController')->parameters([
    'user' => 'admin_user'
]);*/
//Route::get('admin', 'AdminController');
Route::get('/admin', 'AdminController@index')->name("admin");

Route::resource('/admin/articles', 'AdminArticleController', [
        'names' => [
            'index' => 'index_article',
            'store' => 'store_article', // insert into db
            'update' => 'update_article',
            'destroy' => 'destroy_article',
        ]
    ])->only([
    'index', 'create', 'store', 'update', 'destroy'
]);

Route::post('/article/{post}/comments','CommentsController@store');


/*Route::get('/admin/{post_name}', 'AdminController@index')->name('admin');
Route::get('/admin/{id}/edit','AdminController@edit')->name('admin_edit');
Route::get('/admin/{id}/delete','AdminController@destroy')->name('admin_destroy');
Route::get('/admin/create','AdminController@create')->name('admin_create');
Route::post('/admin/create','AdminController@store')->name('admin_store');
Route::post('/admin/update','AdminController@update')->name('admin_update');*/