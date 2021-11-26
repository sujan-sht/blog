<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SocialShareController;
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
// Route::get('social-share', [SocialShareController::class, 'index']);

Route::group(['middleware' => ['auth']],function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    //Profile controller
    
    Route::get('/profile',function(){
        return view('admin.profile.profile');
    })->name('admin.profile.profile');
    Route::get('/profile/edit',[UserProfileController::class,'edit'])->name('admin.profile.edit');
    Route::post('/profile/update',[UserProfileController::class,'update'])->name('profile.update');
    

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

    


});

require __DIR__.'/auth.php';
