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

/**
 * Show user's articles  /users/2/articles/21
 */
Route::get('/users/{user_id}/articles', "PostsController@showUserArticles")->name("user_articles");
Route::get('/users/{user_id}/articles/{article_id}', "PostsController@showUserArticle")->name("user_article");

Route::get('/articles/{article_id}/comments','CommentsController@index')->name("comments_index");
Route::post('/articles/{article_id}/comments','CommentsController@store')->name("comments_store");
/*

;
/*Route::resource('user', 'AdminController')->parameters([
    'user' => 'admin_user'
]);*/
//Route::get('admin', 'AdminController');

Route::get('/users/gestion', 'AdminController@index')->name("user_admin");
Route::get('/users/gestion/{user_id}/articles', 'PostsController@indexArticles')->name("user_admin_articles");
Route::get('/users/gestion/{user_id}/articles/{article_id}/comments', 'CommentsController@index')->name("user_admin_comments");
Route::delete('/users/gestion/{user_id}/articles/{article_id}/comments/{comment_id}', 'CommentsController@destroy')->name("destroy_comments");

/*Route::group(['middleware' => 'auth'], function () {
    Route::get('upload', ['as' => 'upload', 'uses' => 'MediaController@index']);
});*/
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
])->middleware('auth');
Route::get('/admin/contact', 'ContactController@index')->middleware('auth');
Route::delete('/admin/contact/destroy/{contact}', 'ContactController@destroy')->name("destroy_contact")->middleware('auth');

Route::resource('/admin/users', 'UserController',[
    'names' => [
    'index' => 'index_user',
    'store' => 'store_user', // insert into db
    'update' => 'update_user',
    'edit' => 'edit_user',
    'destroy' => 'destroy_User',
]
    ])->only([
    'index', 'create', 'store', 'update', 'destroy' , 'edit'
])->middleware('auth');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
