<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('project', [ProjectController::class, 'index'])->name('project.index');
Route::get('project/detail/{project}', [ProjectController::class, 'show'])->name('project.show');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::prefix('project')->name('project.')->group(function() {
            Route::get('', [AdminProjectController::class, 'index'])->name('index');

            Route::put('/{project}/approve', [AdminProjectController::class, 'approve'])->name('approve');
            Route::put('/{project}/reject', [AdminProjectController::class, 'reject'])->name('reject');
        });
    });

    Route::prefix('project')->name('project.')->group(function () {
        Route::get('/send', [ProjectController::class, 'create'])->name('create');
        Route::post('/send', [ProjectController::class, 'store'])->name('store');

        Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/{project}/edit', [ProjectController::class, 'update'])->name('update');

        Route::delete('/{project}/destroy', [ProjectController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('', [ProfileController::class, 'index'])->name('index');
        Route::get('/u/{username}', [ProfileController::class, 'show'])->name('show');
    });

    Route::get('my-project', function () {
        return view('my-project.index');
    })->name('my-project');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::get('register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});