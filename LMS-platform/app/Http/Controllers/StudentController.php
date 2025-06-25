<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function dashboard()
   {
      $enrolledCourseIds = Auth::user()->enrolledCourses()->pluck('course_id')->toArray();
       $courses = Course::where('status', 'draft')->get();
    return view("student.dashboard", compact('courses', 
   'enrolledCourseIds'));
   }

   public function myCourses(){
   $courses = Auth::user()->enrolledCourses()->with('modules.lessons')->get();
    return view('student.courses.index', compact( 'courses'));
   }

   public function showCourse($slug){
       $enrolledCourseIds = Auth::user()->enrolledCourses()->pluck('course_id')->toArray();
       $course = Course::with(['modules.lessons'])
       ->where('slug', $slug)
     
       ->firstOrFail();
       

       
    return view('student.courses.show', compact('course', 'enrolledCourseIds'));
   }

   //enrollment for a course

   public function enroll($courseId){
      $course = Course::findorfail($courseId);

      if(!Auth::user()->enrolledCourses->contains($courseId)){
         Auth::user()->enrolledCourses()->attach($courseId);
      }

      return redirect()->back()->with('status', 'successfully enrolled');

   }
}
