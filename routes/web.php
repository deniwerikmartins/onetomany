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

use App\Post;
use App\User;

Route::get('/', function () {
    return view('welcome');
});


Route::get('create', function (){

    $user = User::findOrFail(1);

    //$post = new Post(['title' => 'titulo', 'body' => 'corpo']);
    //$user->posts()->save($post);

    $user->posts()->save(new Post(['title' => 'titulo', 'body' => 'corpo']));

});

Route::get('read',function (){
   $user = User::findOrFail(1);

   foreach ($user->posts as $post){
       echo($post->title . "<br>");
   }
});

Route::get('update', function () {

    $user = User::findOrFail(1);

    //$user->posts()->whereId(1)->update(['title' => 'titulo updated', 'body' => 'body updated']);
    $user->posts()->where('id', '=', 2)->update(['title' => 'titulo updated 2', 'body' => 'body updated 2']);

});

Route::get('delete', function () {
    $user = User::findOrFail(1);

    $user->posts()->whereId(1)->delete();
    //$user->posts()->delete();
});
