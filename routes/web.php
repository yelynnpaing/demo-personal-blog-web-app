<?php

use Illuminate\Support\Facades\Route;
use Illuminate\support\Facades\Auth;
use App\Http\Controllers\UiController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminProfileController;
use Illuminate\Routing\RouteGroup;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\CertificateController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\LikeDislikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminProfileControllerController;

Auth::routes();
//UI
Route::get('/about', [UiController::class, 'about']);
Route::get('/', [UiController::class, 'index']);
Route::get('/posts/{id}/detail', [UiController::class, 'postDetail']);
Route::post('/post/like/{postId}', [LikeDislikeController::class, 'like']);
Route::post('/post/dislike/{postId}', [LikeDislikeController::class, 'dislike']);
Route::post('/post/comment/{postId}', [CommentController::class, 'comment']);
Route::get('/search_data', [UiController::class, 'search']);
Route::get('/search_by_category/{categoryId}', [UiController::class, 'searchByCategory']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/password_edit', [ProfileController::class, 'edit']);
Route::post('/password_update', [ProfileController::class, 'update']);


//ADMIN
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    //Admin Profile
    Route::get('/profile', [AdminProfileController::class,'index']);
    Route::get('/password_edit', [AdminProfileController::class,'edit']);
    Route::post('/password_update', [AdminProfileController::class,'update']);

    //USER
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::post('/users/{id}/update', [UserController::class, 'update']);
    Route::post('/users/{id}/delete', [UserController::class, 'delete']);

    //SKILLS
    Route::resource('skills', SkillController::class);

    //PROJECTS
    Route::resource('projects', ProjectController::class);

    //CERTIFICATES
    Route::get('certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::get('certificates/create', [CertificateController::class, 'create'])->name('certificates.create');
    Route::post('certificates/store', [CertificateController::class, 'store'])->name('certificates.store');
    Route::get('certificates/{id}/edit', [CertificateController::class, 'edit'])->name('certificates.edit');
    Route::post('certificates/{id}/update', [CertificateController::class, 'update'])->name('certificates.update');

    //CATEGORY
    Route::resource('categories', CategoryController::class);
    //POST
    Route::resource('posts', PostController::class);
    //COMMENT SHOW HIDE
    Route::post('/posts/{commentId}/show_hide', [PostController::class, 'showHideComment']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
