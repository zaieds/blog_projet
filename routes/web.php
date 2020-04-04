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
Route::get('article', 'ArticlesController@index');

Route::get('/article/{post_name}', 'PostsController@show');


Route::resource('admin/article/{post_name}', 'AdminController@show');
Route::get('admin', 'AdminController@index');
/*Route::resource('user', 'AdminController')->parameters([
    'user' => 'admin_user'
]);*/


//Route::get('article/{n}', 'ArticleController@show' )->where('n', '[0-9]+');
Route::post('/article/{post}/comments','CommentsController@store');

/*
//créer une page contact.blade.php dans source/views
Route::get('/contact', function () {

    $data = [
        'first_name' => 'siwar',
        'last_name' => 'ZiZOU'
    ];
    // elle créer un tableau avec la clé name et une valeur $name
    compact('name', 'toto');

    return view('contact', $data);
});

Route::get('/events', function (){

    $events = ['even1', 'even2', 'even3'];
    return view('events', $events);

});
*/