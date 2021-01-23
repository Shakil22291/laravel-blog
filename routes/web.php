<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostsController::class, 'create'])
    ->middleware('can:create')
    ->name('posts.create');
Route::post('/posts', [PostsController::class, 'store']);
Route::get('/posts/{post:slug}', [PostsController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post:slug}', [PostsController::class, 'destroy'])->name('posts.destroy');

Route::get('tags/{tag:slug}', [TagsController::class, 'show'])->name('tags.show');

require __DIR__.'/auth.php';
