<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReplyController;
use App\Http\Controllers\FrontendSettingsController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\HomeController;


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



Route::get('/',[PagesController::class,'index'])->name('frontend.index');
Route::get('/post/{id}',[PagesController::class,'single'])->name('frontend.single');

Route::post('/post/{post}',[CommentController::class,'store'])->name('comment.store');
Route::get('/post/comment/edit/{comment}',[CommentController::class,'edit'])->name('comment.edit');
Route::post('/post/comment/edit/{comment}',[CommentController::class,'update']);
Route::get('/post/comment/delete/{comment}', [CommentController::class,'delete']);

Route::post('/comment-reply/{comment}',[CommentReplyController::class,'store'])->name('reply.store');

Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('isAdmin');


Route::group(['middleware' => ['auth']],function(){
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('admin.dashboard');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    
    //Profile controller
    Route::get('/profile',function(){
        return view('admin.profile.profile');
    })->name('admin.profile.profile');
    Route::get('/profile/edit',[UserProfileController::class,'edit'])->name('admin.profile.edit');
    Route::post('/profile/update',[UserProfileController::class,'update'])->name('profile.update');
    Route::get('/profile/change_password',[UserProfileController::class,'changePassword'])->name('admin.profile.change_password');
    Route::post('/profile/change_password',[UserProfileController::class,'updatePassword'])->name('profile.change_password');    

    //Post controller
    Route::get('/blog', [PostController::class,'index'])->name('admin.post.index');
    Route::get('/blog/create', [PostController::class,'create'])->name('admin.post.create');
    Route::post('/blog/create', [PostController::class,'store'])->name('admin.post.store');
    Route::get('/blog/edit/{post}', [PostController::class,'edit'])->name('admin.post.edit');
    Route::get('/blog/show/{post}', [PostController::class,'show'])->name('admin.post.show');
    Route::post('/blog/edit/{post}', [PostController::class,'update']);
    Route::get('/blog/delete/{post}', [PostController::class,'destroy']);
    Route::post('ckeditor/upload', [CkeditorController::class,'upload'])->name('ckeditor.upload');

    //Category controller
    Route::get('/category', [CategoryController::class,'index'])->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class,'create'])->name('admin.category.create');
    Route::post('/category/create', [CategoryController::class,'store'])->name('admin.category.store');
    Route::get('/category/edit/{category}', [CategoryController::class,'edit'])->name('admin.category.edit');
    Route::post('/category/edit/{category}', [CategoryController::class,'update']);
    Route::get('/category/delete/{category}', [CategoryController::class,'destroy']);

    //Frontend Settings Controller
    Route::get('/settings', [FrontendSettingsController::class,'index'])->name('admin.settings.index');
    Route::get('/settings/create', [FrontendSettingsController::class,'create'])->name('admin.settings.create');
    Route::post('/settings/create', [FrontendSettingsController::class,'store'])->name('admin.settings.store');
    Route::get('/settings/edit/{settings}', [FrontendSettingsController::class,'edit'])->name('admin.settings.edit');
    Route::post('/settings/edit/{settings}', [FrontendSettingsController::class,'update']);

    //navbar controller
    Route::get('/navbar', [NavbarController::class,'index'])->name('admin.navbar.index');
    Route::get('/navbar/create', [NavbarController::class,'create'])->name('admin.navbar.create');
    Route::post('/navbar/create', [NavbarController::class,'store'])->name('admin.navbar.store');
    Route::get('/navbar/edit/{navbar}', [NavbarController::class,'edit'])->name('admin.navbar.edit');
    Route::post('/navbar/edit/{navbar}', [NavbarController::class,'update']);
    Route::get('/navbar/delete/{navbar}', [NavbarController::class,'destroy']);

});

require __DIR__.'/auth.php';
