<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FeedbackCategoryController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');


// admin group routes
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/products', [AdminController::class, 'adminShowAllProduct'])->name('admin.product.index');
    Route::get('/products/comments', [AdminController::class, 'adminGetAllComments'])->name('admin.comment.index');
    Route::delete('/products/delete/{id}', [AdminController::class, 'adminDeleteProduct'])->name('admin.product.delete');
    Route::delete('/products/comments/{id}', [AdminController::class, 'adminDeleteComment'])->name('admin.comment.delete');
    Route::resource('category', CategoryController::class);
    Route::resource('feebackcategory', FeedbackCategoryController::class);
    Route::resource('feedback', FeedbackController::class);
Route::get('/feedback/create/{id}', [FeedbackController::class, 'create'])->name('feedbackk.create');
Route::post('/feedback/store/{id}', [FeedbackController::class, 'store'])->name('feedbackk.store');
Route::delete('/feedback/delete/{id}', [FeedbackController::class, 'destroy'])->name('feedbackk.delete');
    
});


Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');

//Route::get('products/{id}', [CommentController::class, 'loadComments'])->name('product.show');
Route::post('/products/{id}', [CommentController::class, 'addComment']);
Route::delete('/comment/delete/{id}', [CommentController::class, 'destroy'])->name('comment.delete');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('feedback', FeedbackController::class);
Route::get('/feedback/create/{id}', [FeedbackController::class, 'create'])->name('feedbackk.create');
Route::post('/feedback/store/{id}', [FeedbackController::class, 'store'])->name('feedbackk.store');
Route::delete('/feedback/delete/{id}', [FeedbackController::class, 'destroy'])->name('feedbackk.delete');
Route::post('/feedback/voteup/{id}', [FeedbackController::class, 'voteup'])->name('feedbackk.voteup');
Route::post('/feedback/votedown/{id}', [FeedbackController::class, 'votedown'])->name('feedbackk.votedown');
//Route::get('/admin/products', [AdminController::class, 'adminShowAllProduct'])->name('admin.product.index');
//Route::get('/admin/products/comments', [AdminController::class, 'adminGetAllComments'])->name('admin.comment.index');
//Route::delete('/admin/products/delete/{id}', [AdminController::class, 'adminDeleteProduct'])->name('admin.product.delete');
//Route::delete('/admin/products/comments/{id}', [AdminController::class, 'adminDeleteComment'])->name('admin.comment.delete');
