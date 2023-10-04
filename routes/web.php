<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;

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

//  Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/sign-up', [RegisterController::class, 'create'])->name('register.create')->middleware('guest');

Route::post('/sign-up', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->name('login.create')->middleware('guest');

Route::post('/login', [SessionsController::class, 'store'])->name('login.store')->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');

Route::post('/posts/{post}/comments', [PostCommentsController::class, 'store'])->name('posts.comments.store')->middleware('auth');

Route::post('newsletter', NewsletterController::class);

// Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('admin');

Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store')->middleware('admin');

Route::get('/tags', [TagController::class, 'index'])->name('tags.index');

Route::get('/tags/{tag}', [TagController::class, 'show']);

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/post/{post}', [PostController::class, 'show_one'])->name('post.show');
