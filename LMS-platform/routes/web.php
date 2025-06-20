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
Route::get("instructors", [AdminController::class, 'instructor']);  
Route::resource('roles', RoleController::class);
Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);

Route::resource('permissions', PermissionController::class);
Route::get("permissions/{permissionId}/delete", [PermissionController::class, 'destroy']);


Route::resource('users', UserController::class);
Route::get("users/{userId}/delete", [UserController::class, 'destroy']);



 });

//middleware for instructor

Route::middleware(['auth', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function(){
    Route::get('dashboard', [InstructorController::class, 'index']);
    Route::resource('courses', InstructorController::class);
    Route::get('register', [InstructorController::class, 'viewRegisterPage']);
    Route::post('register', [InstructorController::class, 'storeRegistration']);
});


require __DIR__.'/auth.php';
