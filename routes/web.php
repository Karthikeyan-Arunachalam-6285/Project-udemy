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

 
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('Post');
//Route::get('post/{post}', [App\Http\Controllers\PostController::class, 'show']);

// Route::middleware('auth')->group(function(){

//     Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
//     // Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('Post');

//     Route::get('admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('Post.create');
 
 
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(function(){
    
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');

    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    
 
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('store');

    Route::get('/adminviewpost', [App\Http\Controllers\PostController::class, 'index'])->name('post.view');

    Route::get('/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name(' post.delete ');

    Route::get('admin/editpost/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name(' post.editpost');


    Route::post('/adminupdate', [App\Http\Controllers\PostController::class, 'updatePost'])->name(' post.editpost');

    Route::get('/user-profile/{user}', [App\Http\Controllers\UserController::class , 'showUsers'])->name('user-profile');
    
    Route::put('/admin/user/profile', [App\Http\Controllers\UserController::class , 'update'])->name('update-userprofile');

    Route::get('/admin/users', [App\Http\Controllers\UserController::class , 'index'])->name('admin-users');

    Route::post('/admin/users/index/{id}', [App\Http\Controllers\UserController::class , 'delete'])->name('users-delete');

});
 
 
// Route::middleware('role:admin')->group(function(){
//     Route::get('/admin/users', [App\Http\Controllers\UserController::class , 'index'])->name('admin-users');
 

// });