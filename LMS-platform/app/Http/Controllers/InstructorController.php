<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Enums\CourseLevel;
use App\Models\Instructor;
use App\Enums\CourseStatus;
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

    // course
    public function create(){
        
        return view("instructor.courses.create");
    }

    public function store(Request $request){
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,|max:2048',
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

     public function show($id){
        $course = Course::with(['modules.lessons'])->where('instructor_id', Auth::id())->findorfail($id);
         $instructors = Instructor::where('user_id', Auth::id())->get();
        return view('instructor.courses.show', compact('course', 'instructors'));
    }

   

    //modules

    public function moduleIndex(){
        $instructors = Instructor::get();
        return view('instructor.modules.index', compact('instructors'));
    }

    public function moduleCreate(Course $course){
         $instructors = Instructor::get();
        return view('instructor.modules.create', compact('instructors', 'course'));
    }

    public function moduleStore(Request $request , Course $course){
       $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $course->modules()->create($validated);

        return redirect('instructor/modules')->with("status", 'module added successfully!');
    }



    //lessons
    public function lessonIndex(){
        $instructors = Instructor::get();
        return view('instructor.lessons.index', compact('instructors'));
    }

    public function lessonCreate(Module $module){
         $instructors = Instructor::get();
        return view('instructor.lessons.create', compact('instructors', 'module'));
    }

    public function lessonStore(Request $request, Module $module)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'video__url'=> 'nullable|mimes:mp4',
            'pdf_path' => 'nullable|mimes:pdf'
        ]);

         $pdf_path = $request->file('pdf_path')->store('lessons', 'public');
          $video__url = $request->hasFile('video__url') ? $request->file('video__url')->store('lessons', 'public') : null;
         

          $module->lessons()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'pdf_path' => $pdf_path,
            'video__url' => $video__url
        ]);

        return redirect('instructor/lessons')->with("status", 'lesson added');
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

