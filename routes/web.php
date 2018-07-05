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

// App::singleton("App\Billing\Strips",function(){
//     return new App\Billing\Strips(config("services.stripe.secret"));
// });

// $stripe = resolve("App\Billing\Strips");
// dd($stripe);

Auth::routes();

Route::get("/",function(){
    return view("welcome");
});

Route::resource("posts","PostController");
Route::patch("posts/{post}/comments","CommentController@store");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reflect', 'ReflectionController@test');
