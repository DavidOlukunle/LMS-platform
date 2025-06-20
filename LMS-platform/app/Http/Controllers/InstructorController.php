<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Enums\CourseLevel;
use App\Enums\CourseStatus;
use App\Models\Instructor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function index(){
        $courses = Course::where('instructor_id',  Auth::id())->get();
        $instructors = Instructor::where('user_id', Auth::id())->get();
        return view('instructor.dashboard', compact('courses','instructors'));
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

    // submission of credentials
    public function viewRegisterPage(){
        return view('instructor.register');
    }

    public function storeRegistration(Request $request){
        $request->validate([
            'department' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'credential_1' => 'required|file|mimes:pdf, jpg,png,jpeg|max:2048',
            'credential_2' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048'
        ]);

        $user = Auth::user();
        $credential_1 =$request->file('credential_1')->store('credentials', 'public');
        $credential_2 = $request->hasFile('credential_2') ? $request->file('credential_2')->store('certificate', 'public') : null;

        Instructor::create([
            'user_id' => $user->id,
            'department' => $request->department,
            'bio' => $request->bio,
            'credential_1' => $credential_1,
            'credential_2' => $credential_2,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('status', 'your details have been sent. You will be notified of your approval');
    }
}

