<?php

use App\Http\Controllers\SessionsController;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;

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


Route::get('/', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'categories' => Category::all()
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', ['posts' => $author->posts]);
});

Route::get('/iform', function () {
    return view('iform');
});

Route::post('/iform', function(\Illuminate\Http\Request $request) {
    $category = new Category();
    $category->name = $request->name;
    $category->slug = $request->slug;
    $category->save();
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('create', [PostController::class, 'create'])->middleware('auth');

Route::post('create', [PostController::class, 'store'])->middleware('auth');
