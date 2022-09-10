<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (){
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::resource('roles', RoleController::class);
});

require __DIR__.'/auth.php';
