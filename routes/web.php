<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
$route = app()->make('router');
$route->get('/',function(){
    return view('welcome');
});



Route::get('/Posts', [PostController::class, 'index'])->name('Posts.index');
Route::post('/Posts',[PostController::class,'store'])->name('Posts.store');
Route::get('/Posts/{post}/edit', [PostController::class, 'edit'])->name('Posts.edit');
Route::get('/Posts/create',[PostController::class,'create'])->name('Posts.create');
Route::delete('/Posts/{post}', [PostController::class, 'delete'])->name('Posts.delete');

Route::put('/Posts/{post}', [PostController::class, 'update'])->name('Posts.update');
Route::get('/Posts/{post}', [PostController::class, 'Show'])->name('Posts.show');

