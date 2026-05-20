<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Sensor;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\UserDashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// redirect awal
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/api/sensor', function () {
    return Sensor::latest()->take(10)->get()->reverse()->values();
});


// ======================
// DASHBOARD (USER / ADMIN REDIRECT)
// ======================
Route::get('/help', [HelpController::class, 'index'])
    ->name('help');
Route::get('/about', [HelpController::class, 'about'])
    ->name('about');
Route::get('/dashboard', function () {
    $user = Auth::user();

    // Use UserDashboardController for the index view
    return app(UserDashboardController::class)->index();
})->name('dashboard');



// ======================
// ADMIN ROUTE
// ======================
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin');

});


// ======================
// PROFILE (BREEZE)
// ======================
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::get('/admin/history', [AdminController::class, 'history'])
    ->name('admin.history');

Route::get('/admin/history/download', [AdminController::class, 'download'])
    ->middleware(['auth', 'admin'])
    ->name('admin.history.download');

Route::get('/admin/history/pdf', [AdminController::class, 'pdf'])
    ->middleware(['auth', 'admin'])
    ->name('admin.history.pdf');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index']);
    Route::post('/admin/users/update/{id}', [UserController::class, 'update']);
    Route::post('/admin/users/role/{id}', [UserController::class, 'changeRole']);
    Route::delete('/admin/users/delete/{id}', [UserController::class, 'destroy']);
});

// Route::get('/dashboard', [UserDashboardController::class, 'index'])
//     ->name('dashboard');


// ======================
// AUTH (LOGIN, REGISTER)
// ======================
require __DIR__.'/auth.php';