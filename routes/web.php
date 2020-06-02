<?php

use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;


Route::get('/', function (){
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('index','HomePageController@index')->name('index');
Route::get('/category/{id}','HomePageController@AdsByCategory');
Route::get('/post/{id}/details','HomePageController@showPostDetails');

# auth middelware
Route::get('/addpost','PostController@create');
Route::post('/addpost','PostController@store');
Route::get('/post/edit/{id}','PostController@edit_post');
Route::put('/post/update/{id}','PostController@update_post');
Route::delete('/post/delete/{id}','PostController@delete_post');
Route::post('/addcomment','PostController@store_comment')->name('addcomment');

Route::get('/comment/edit/{id}','PostController@show_edit_comment');
Route::put('/comment/edit/{id}','PostController@edit_comment')->name('editcomment');
Route::delete('/comment/delete/{id}','PostController@delete_comment')->name('deletecomment');
Route::get('/user/profile/{id}','PostController@show_myprofile');
Route::get('/user/profile/{id}/edit','PostController@show_editmyprofile');
Route::put('/user/profile/{id}/postedit','PostController@editmyprofile');
Route::put('/user/profile/{id}/posteditpassword','PostController@editmypassword');


# auth middelware




# admin middelware
Route::resource('admin/post','admin\PostController');
/*
 * +--------+-----------+------------------------+--------------+---------------------------------------------------+--------------+
| Domain | Method    | URI                    | Name         | Action                                            | Middleware   |
+--------+-----------+------------------------+--------------+---------------------------------------------------+--------------+
|        | GET|HEAD  | admin/post             | post.index   | App\Http\Controllers\admin\PostController@index   | web          |
|        | POST      | admin/post             | post.store   | App\Http\Controllers\admin\PostController@store   | web          |
|        | GET|HEAD  | admin/post/create      | post.create  | App\Http\Controllers\admin\PostController@create  | web          |
|        | GET|HEAD  | admin/post/{post}      | post.show    | App\Http\Controllers\admin\PostController@show    | web          |
|        | PUT|PATCH | admin/post/{post}      | post.update  | App\Http\Controllers\admin\PostController@update  | web          |
|        | DELETE    | admin/post/{post}      | post.destroy | App\Http\Controllers\admin\PostController@destroy | web          |
|        | GET|HEAD  | admin/post/{post}/edit | post.edit    | App\Http\Controllers\admin\PostController@edit    | web          |
+--------+-----------+------------------------+--------------+---------------------------------------------------+--------------+
 */

Route::resource('admin/user','admin\UserController');
Route::put('admin/user/{id}/updatepassword','admin\UserController@updatepassword')->name('user.update_password');
/*
 * +--------+-----------+------------------------+--------------+---------------------------------------------------+--------------+
| Domain | Method    | URI                    | Name         | Action                                            | Middleware   |
+--------+-----------+------------------------+--------------+---------------------------------------------------+--------------+
|        | GET|HEAD  | admin/user             | user.index   | App\Http\Controllers\admin\UserController@index   | web          |
|        | POST      | admin/user             | user.store   | App\Http\Controllers\admin\UserController@store   | web          |
|        | GET|HEAD  | admin/user/create      | user.create  | App\Http\Controllers\admin\UserController@create  | web          |
|        | GET|HEAD  | admin/user/{user}      | user.show    | App\Http\Controllers\admin\UserController@show    | web          |
|        | PUT|PATCH | admin/user/{user}      | user.update  | App\Http\Controllers\admin\UserController@update  | web          |
|        | DELETE    | admin/user/{user}      | user.destroy | App\Http\Controllers\admin\UserController@destroy | web          |
|        | GET|HEAD  | admin/user/{user}/edit | user.edit    | App\Http\Controllers\admin\UserController@edit    | web          |
+--------+-----------+------------------------+--------------+---------------------------------------------------+--------------+
 */

Route::resource('admin/category','admin\CategoryController');

/*
 * +--------+-----------+------------------------+--------------+-------------------------------------------------------+-----------------------+
| Domain | Method    | URI                            | Name             | Action                                                | Middleware   |
+--------+-----------+------------------------+--------------+-------------------------------------------------------+--------------------------+
|        | GET|HEAD  | admin/category                 | category.index   | App\Http\Controllers\admin\CategoryController@index   | web          |
|        | POST      | admin/category                 | category.store   | App\Http\Controllers\admin\CategoryController@store   | web          |
|        | GET|HEAD  | admin/category/create          | category.create  | App\Http\Controllers\admin\CategoryController@create  | web          |
|        | GET|HEAD  | admin/category/{category}      | category.show    | App\Http\Controllers\admin\CategoryController@show    | web          |
|        | PUT|PATCH | admin/category/{category}      | category.update  | App\Http\Controllers\admin\CategoryController@update  | web          |
|        | DELETE    | admin/category/{category}      | category.destroy | App\Http\Controllers\admin\CategoryController@destroy | web          |
|        | GET|HEAD  | admin/category/{category}/edit | category.edit    | App\Http\Controllers\admin\CategoryController@edit    | web          |
+--------+-----------+------------------------+--------------+-------------------------------------------------------+--------------------------+
 */


Route::get('/adminpanel',function (){

    return view('back.index');
})->middleware('isadmin');
# admin middelware





