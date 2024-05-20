<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CompanyController;
use App\Http\Controllers\Dashboard\JopController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\NotificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::group(
    ['middleware' => ['lastActivity']],
    function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/jop/{slug}', [HomeController::class, 'jop'])->name('jop');
        Route::get('/company/{slug}', [HomeController::class, 'company'])->name('company');
        Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');
        Route::get('/jop/{slug}', [HomeController::class, 'jop'])->name('jop');
        Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comment.store');
        Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
        Route::get('/post_job', [HomeController::class, 'post_job'])->name('post_job');
        Route::post('/post_job', [HomeController::class, 'create_post_jop'])->name('create.post_job');
        Route::get('/search', [HomeController::class, 'search'])->name('search');
        Route::middleware('auth')->group(function () {
            // notifications Route
            Route::get('user/{name}/notifications', [NotificationController::class, 'notify_as_read'])->name('notifications');
            Route::get('user/notifications', [NotificationController::class, 'Allnotifications'])->name('All.notifications');
            Route::delete('user/{id}/notifications', [NotificationController::class, 'destroy'])->name('notification.destroy');
            Route::delete('user/notifications', [NotificationController::class, 'destroyall'])->name('notification.destroyall');
            // users Route
            Route::patch('dashboard/user/{name}', [UserController::class, 'update'])->name('users.update');
            Route::get('dashboard/user/{name}', [UserController::class, 'show'])->name('users.show');
            Route::get('user/{name}', [UserController::class, 'edit'])->name('users.edit');
            // End of users Route

            // jops Route
            Route::get('jops/trash', [JopController::class, 'trash'])->name('jops.trash');
            Route::delete('jops/trash/{slug}', [JopController::class, 'forcedestroy'])->name('jops.force.destroy');
            Route::post('jops/restore/{slug}', [JopController::class, 'restore'])->name('jops.restore');
            Route::resource('jops', JopController::class);
            // End of jops Route

            // categories Route
            Route::resource('categories', CategoryController::class);
            Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
            Route::delete('categories/trash/{id}', [CategoryController::class, 'forcedestroy'])->name('categories.force.destroy');
            Route::post('categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
            // End of categories Route

            // companies Route
            Route::resource('companies', CompanyController::class);
            Route::get('companies/trash', [CompanyController::class, 'trash'])->name('companies.trash');
            Route::delete('companies/trash/{id}', [CompanyController::class, 'forcedestroy'])->name('companies.force.destroy');
            Route::post('companies/restore/{id}', [CompanyController::class, 'restore'])->name('companies.restore');
            // End of companies Route
        });
    }
);


require __DIR__ . '/auth.php';