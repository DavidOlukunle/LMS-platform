<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;

Route::get('/', function () {
    return view('welcome');
});


// middleware for student
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:student'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//middleware for admin
 Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function(){

Route::get('dashboard', [AdminController::class, 'index']);   
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('users', UserController::class);

 });

//middleware for instructor

Route::middleware(['auth', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function(){
    Route::get('dashboard', [InstructorController::class, 'index']);
    Route::resource('courses', InstructorController::class);
});


require __DIR__.'/auth.php';
