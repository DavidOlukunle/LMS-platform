<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){
        $course = Course::count();
       $instructors = User::role('instructor')->count();
       $users = User::role('student')->count();
        return view('admin.dashboard',[
            'course' => $course,
            'instructors' => $instructors,
            'users' => $users
        ]);
    }

    public function instructor(){
        $instructors = User::role('instructor')->with('instructor')->get();
        // $instructorDetails = Instructor::get();
        return view('admin.instructor.index', compact('instructors', ));
    }

    public function viewInstructor($instructorId){
        $instructor = User::with(['instructor'])->findorfail($instructorId);
        $instructorDetails = Instructor::get();
        return view('admin.instructor.view-instructor', compact('instructor', 'instructorDetails'));

    }

    public function updateStatus(Request $request, $instructorId){
        $request->validate(['status'=>'required']);

        $user = User::with('instructor')->findorfail($instructorId);
       if($user->instructor){
        $user->instructor->status = $request->status;
        $user->instructor->save();
       }

        return redirect()->back()->with('status', 'updated successfully');
    }

    public function viewCourses(){
        $courses = Course::get();
        return view('admin.instructor.courses', compact('courses'));
    }

    public function publishCourse($courseId){
        
        $course = Course::findorfail($courseId);
        $course->status = "published";
        $course->save();

        return redirect()->back()->with('success', 'course published successfully');

    }

     public function unpublishCourse($courseId){
        
        $course = Course::findorfail($courseId);
        $course->status = "draft";
        $course->save();

        return redirect()->back()->with('success', 'course unpublished successfully');

    }
}
