@extends('instructor.layout')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow">
    <div class="mb-6 border-b pb-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $course->title }}</h2>
        <p class="text-gray-600">{{ $course->description }}</p>
        <div class="flex items-center text-sm text-gray-500 mt-3 space-x-4">
            <span><strong>Level:</strong> {{ $course->level }}</span>
            <span><strong>Status:</strong> {{ $course->status }}</span>
            <span><strong>Created:</strong> {{ $course->created_at->diffForHumans() }}</span>
        </div>
    </div>

    @if($course->modules->count())
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Modules & Lessons</h3>
        <div class="space-y-6">
            @foreach($course->modules as $module)
                <div class="border rounded p-4 bg-gray-50 shadow-sm">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="text-lg font-bold text-gray-800">{{ $module->title }}</h4>
                        <a href="{{ url('instructor/lessons/' . $module->id . '/create') }}"
                           class="text-sm bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                            + Add Lesson
                        </a>
                    </div>
                    <p class="text-gray-600 mb-3">{{ $module->description }}</p>

                    @if($module->lessons->count())
                        <ul class="list-disc pl-5 space-y-1 text-gray-700">
                            @foreach($module->lessons as $lesson)
                                <li>
                                    <strong>{{ $lesson->title }}</strong>
                                    <span class="text-sm text-gray-500">({{ ucfirst($lesson->content) }})</span>
                                    @if($lesson->type === 'pdf')
                                        <a href="{{ asset('storage/' . $lesson->file_path) }}" target="_blank" class="text-blue-600 hover:underline ml-2">View</a>
                                    @elseif($lesson->type === 'video')
                                        <video controls class="w-full mt-2 rounded">
                                            <source src="{{ asset('storage/' . $lesson->file_path) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-gray-500 italic">No lessons in this module yet.</p>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">This course has no modules yet.</p>
    @endif

    {{-- Add Module Button --}}
    <div class="mt-6 text-right">
        <a href="{{ url('instructor/modules/' . $course->slug . '/create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add Module
        </a>
    </div>
</div>
@endsection
