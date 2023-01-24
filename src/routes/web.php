<?php

use Jalpeshtxtech\Users\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest', 'web'])->group(function () {
	Route::get('users', [UsersController::class, 'index'])->name('users.list');
    Route::get('users/add', [UsersController::class, 'add'])->name('users.add');
    Route::post('users/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::get('users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');
});

