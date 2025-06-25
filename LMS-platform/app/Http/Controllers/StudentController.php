<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function dashboard()
   {
       $courses = Course::where('status', 'draft')->get();
    return view("student.dashboard", compact('courses'));
   }

   public function courses(){
    $user = Auth::user();
    $courses = Course::where('status', 'draft')->get();
    return view('student.courses.index', compact('user', 'courses'));
   }

   public function showCourse($slug){
       $course = Course::with(['modules.lessons'])
       ->where('slug', $slug)
     
       ->firstOrFail();

       
    return view('student.courses.show', compact('course'));
   }
}
