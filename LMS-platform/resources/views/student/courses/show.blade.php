@extends('student.layout')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ $course->title }}</h2>
    <p class="text-gray-600 mb-6">{{ $course->description }}</p>

    @if($course->modules->count())
        <div class="space-y-6">
            @foreach($course->modules as $module)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $module->title }}</h3>
                    <p class="text-sm text-gray-600 mb-4">{{ $module->description }}</p>

                    @if($module->lessons->count())
                        <ul class="divide-y divide-gray-200">
                            @foreach($module->lessons as $lesson)
                                <li class="py-3">
                                    <div class="flex justify-between items-center">
                                        <span class="font-medium">{{ $lesson->title }}</span>
                                        <span class="text-xs text-gray-500 uppercase">{{ $lesson->type }}</span>
                                    </div>

                                   @if(in_array($course->id, $enrolledCourseIds))
                                    @if($lesson->video__url || $lesson->path)
                                        <video controls class="w-full mt-2 rounded-md shadow">
                                            <source src="{{ asset('storage/' . $lesson->video__url) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    
                                        <a href="{{ asset('storage/' . $lesson->pdf_path) }}" target="_blank"
                                           class="inline-block mt-2 text-blue-600 hover:underline">
                                           View PDF
                                        </a>
                                    @endif
                                    @else
                                    <p class='text-blue-600'><a href="{{url('student/dashboard')}}"> enroll to have full acess to course materials</a></p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-gray-500 italic">No lessons available in this module yet.</p>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">This course has no modules or lessons yet.</p>
    @endif
</div>
@endsection
    