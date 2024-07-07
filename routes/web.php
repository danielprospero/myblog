<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\AdminPostsController;
use App\Http\Controllers\AdminControllers\TinyMCEController;
use App\Http\Controllers\AdminControllers\AdminCategoriesController;
use App\Http\Controllers\AdminControllers\AdminTagsController;

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

// Front User Routes 

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/post/{post:slug}', [ PostsController::class, 'show' ])->name('posts.show');
Route::post('/post/{post:slug}', [ PostsController::class, 'addComment' ])->name('posts.add_comment');

Route::get('/about', AboutController::class)->name('about');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/categoreis/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categoreis', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/tags/{tag:name}', [TagController::class, 'show'])->name('tags.show');

require __DIR__.'/auth.php';

// Admin Dashboard Routes

Route::prefix('admin')->name('admin.')->middleware('auth', 'isadmin')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::post('upload_tinymce_image', [TinyMCEController::class, 'upload_tinymce_image'])->name('upload_tinymce_image');

    Route::resource('posts', AdminPostsController::class);
    Route::resource('categories', AdminCategoriesController::class);

    Route::resource('tags', AdminTagsController::class)->only(['index', 'show', 'destroy', 'edit']);

});