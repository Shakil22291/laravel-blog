<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserProfilePhotosController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/example', function(Request $request) {
    $body = $request->input('body');
    $json = json_encode($body);
    $decoded = json_decode($body, true);
    die(var_dump($decoded));
    // ddd($body);
});

Route::get('/', [PagesController::class, 'welcome']);

Route::get('/dashboard', function () {
    return view('dashboard', [
        'posts' => auth()->user()->posts
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/search', function(Request $request) {
    $posts = Post::all()->search('t');
    ddd($posts);
    // return view('search', [
    //     'posts' => Post::search($request->input('search'))
    // ]);
});


Route::get('user/{user}', [UserProfileController::class, 'show'])->name('profile.show');
Route::get('user/{user}/edit', [UserProfileController::class, 'edit'])->name('profile.edit');

Route::post('/user/{user}/profile-photo', [UserProfilePhotosController::class, 'store']);
Route::delete('/user/{user}/profile-photo', [UserProfilePhotosController::class, 'destroy']);

Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostsController::class, 'store']);
Route::get('/posts/{post:slug}', [PostsController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post:slug}', [PostsController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post:slug}/edit', [PostsController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{post:slug}', [PostsController::class, 'update']);

Route::get('tags/{tag:slug}', [TagsController::class, 'show'])->name('tags.show');

Route::get('contact', [ContactController::class, 'show'])->name('contact');
Route::post('contact', [ContactController::class, 'store']);

require __DIR__.'/auth.php';
