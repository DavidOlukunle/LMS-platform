<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;

Route::get('/', function () {
    return view('welcome');
});


// middleware for student
// Route::get('/dashboard', function () {
//     return view('student.ashboard');
// })->middleware(['auth', 'role:student'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });




//middleware for admin
 Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function(){

Route::get('dashboard', [AdminController::class, 'index']); 
Route::get("instructors", [AdminController::class, 'instructor']);  
Route::get('instructor/courses', [AdminController::class, 'viewCourses']);
Route::get('instructor/{instructorId}/view-instructor', [AdminController::class, 'viewInstructor']);
Route::patch('instructor/{instructorId}/updateStatus', [AdminController::class, 'updateStatus']);
Route::patch('instructor/{courseId}/publishCourse', [AdminController::class, 'publishCourse']);
Route::patch('instructor/{courseId}/unpublishCourse', [AdminController::class, 'unpublishCourse']);

Route::resource('roles', RoleController::class);
Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);

Route::resource('permissions', PermissionController::class);
Route::get("permissions/{permissionId}/delete", [PermissionController::class, 'destroy']);


Route::resource('users', UserController::class);
Route::get("users/{userId}/delete", [UserController::class, 'destroy']);



 });


 //route for students

Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function() {
    Route::get('dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('courses', [StudentController::class, 'myCourses']);
    Route::get('courses/{course:slug}/show', [studentController::class, 'showCourse']);
    Route::post('courses/{course}/enroll', [StudentController::class, 'enroll']);
});
    


//middleware for instructor

Route::middleware(['auth', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function(){
    Route::get('dashboard', [InstructorController::class, 'index']);
    //course routes
    Route::resource('courses', InstructorController::class);


    //registration as an instructor routes
    Route::get('register', [InstructorController::class, 'viewRegisterPage']);
    Route::post('register', [InstructorController::class, 'storeRegistration']);

    //module routes
    Route::get('modules', [InstructorController::class, 'moduleIndex']);
    Route::get('modules/{course:slug}/create', [InstructorController::class, 'moduleCreate']);
    Route::post('modules/{course:slug}/store', [InstructorController::class, 'moduleStore']);

    //lesson routes
     Route::get('lessons', [InstructorController::class, 'lessonIndex']);
    Route::get('lessons/{module}/create', [InstructorController::class, 'lessonCreate']);
    Route::post('lessons/{module}/store', [InstructorController::class, 'lessonStore']);

});


require __DIR__.'/auth.php';
