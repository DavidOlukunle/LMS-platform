@extends('student.layout')

@section('content')
    <div class="max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">My Courses</h2>

        @if($courses->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($courses as $course)
                    <div class="bg-white rounded shadow p-4 hover:shadow-lg transition">
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Course Image" class="w-full h-32 object-cover rounded mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $course->title }}</h3>
                        <p class="text-sm text-gray-600 mb-2">By {{ $course->instructor->name ?? 'Instructor' }}</p>

                        <a href="{{ url('student/courses/' .$course->slug.'/show') }}"
                           class="mt-2 inline-block text-sm text-white bg-blue-600 px-3 py-1 rounded hover:bg-blue-700">
                            View Course
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">You're not enrolled in any courses yet.</p>
        @endif
    </div>
@endsection
