<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Enums\CourseLevel;
use App\Enums\CourseStatus;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function index(){
        $courses = Course::where('instructor_id',  Auth::id())->get();
        return view('instructor.dashboard', compact('courses'));
    }

    public function create(){
        return view("instructor.courses.create");
    }

    public function store(Request $request){
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,|max2048',
            'level'  => 'nullable|in:beginner,intermediate,advanced',
            'status' => ''
        ]);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('courses', 'public');
        }
        $data['instructor_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title'] . '-' . Str::random(6));
        $data['status'] = 'draft';
        
        Course::create($data);

        return redirect('instructor/dashboard')->with("status", "course created successfully");

    }
}

