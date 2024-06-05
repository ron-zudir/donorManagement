<?php

use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::name('admin.')->prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {

            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        
        
            Route::get('/donors',[DonorController::class, 'index'])->name('donors');
            Route::get('/donors/create',[DonorController::class, 'create'])->name('donors.create');
            Route::post('/donors',[DonorController::class, 'store'])->name('donors.store');
            Route::get('/donors/edit/{id}',[DonorController::class, 'edit'])->name('donors.edit');
            Route::put('/donors/update/{id}',[DonorController::class, 'update'])->name('donors.update');
            Route::delete('/donors/delete/{id}',[DonorController::class, 'edit'])->name('donors.delete');

            Route::resource('roles',RoleController::class);
            Route::resource('permissions',PermissionController::class);

        });
});

require __DIR__.'/auth.php';
