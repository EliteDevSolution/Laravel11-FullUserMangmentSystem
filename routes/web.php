<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/'], function() {
    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('submit-login');
    Route::post('register', [\App\Http\Controllers\Auth\LoginController::class, 'register'])->name('submit-register');
    Route::get('register', [\App\Http\Controllers\Auth\LoginController::class, 'showRegistrationForm'])->name('register');

    Route::middleware(['auth', 'redirect_auth'])->group(function () {
        Route::get('/', [\App\Http\Controllers\Pages\DashboardController::class, 'index'])->name('dashboard');
        Route::post('/role', [\App\Http\Controllers\Auth\RolePermissionController::class, 'createRole']);
        Route::post('/permission', [\App\Http\Controllers\Auth\RolePermissionController::class, 'createPermission']);
        Route::post('/assign-role/{userId}', [\App\Http\Controllers\Auth\RolePermissionController::class, 'assignRole']);
        Route::post('/give-permission-to-role', [\App\Http\Controllers\Auth\RolePermissionController::class, 'givePermissionToRole']);

        Route::get('/my-account', [\App\Http\Controllers\Pages\MyAccountController::class, 'show'])->name('my-account');
        Route::post('my-account/personal', [\App\Http\Controllers\Pages\MyAccountController::class, 'updatePersonal'])->name('my-account.personal');
        Route::post('my-account/password', [\App\Http\Controllers\Pages\MyAccountController::class, 'updatePassword'])->name('my-account.password');

        // Users
        Route::resource('users', \App\Http\Controllers\Pages\UsersController::class);
        Route::get('users-datatable', [\App\Http\Controllers\Pages\UsersController::class, 'datatable'])->name('users.datatable');
        //Route::post('users/{id}', [\App\Http\Controllers\Pages\UsersController::class, 'getUser'])->name('users.get-user');

    });

});
