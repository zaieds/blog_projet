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

//Route::get('/', function () {
//    return view('welcome', ['posts'=> App\Post::all()]);
//});
//Route::get('/contact', 'ContactController@index')->name("contact");

/*article_show
 * route vers la créaction de contact
 */
Route::get('/contact/create', 'ContactController@create')->name("contact");;

/*
 * route vers la confirmation de création de contact
 */
Route::post('/contact', 'ContactController@store');

/*
 * route vers la page d'acceuil
 */
Route::get('/', 'HomeController@index')->name("home");

/*
 * route vers la création de l'utilisateur
 */
Route::get('users', 'UserController@getInfos')->name("users");
Route::post('users', 'UserController@postInfos')->name("users_store");

/*
 * route vers l'affichage du liste des articles
 */
Route::get('articles', 'PostsController@index')->name("articles");

/*
 * route vers les articles
 */
Route::get('/articles/{post_id}', 'PostsController@show')->name("article_show");


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
            'edit' => 'edit_article',
            'destroy' => 'destroy_article',
        ]
    ])->only([
    'index', 'create', 'store', 'update', 'destroy' , 'edit'
]);

Route::post('/article/{post}/comments','CommentsController@store')->name("comments_store");

