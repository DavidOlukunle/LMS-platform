@extends('student.layout')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Welcome, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-600">Here’s an overview of your learning progress.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-blue-100 p-4 rounded shadow text-center"><a href ="{{{url('student/courses')}}}">
                <h3 class="text-lg font-semibold text-blue-800"> Enrolled Courses</h3>
                <p class="text-2xl mt-2 font-bold">{{count($enrolledCourseIds)}}</p></a>
            </div>
            <div class="bg-green-100 p-4 rounded shadow text-center">
                <h3 class="text-lg font-semibold text-green-800">Completed Modules</h3>
                <p class="text-2xl mt-2 font-bold">12</p>
            </div>
            <div class="bg-yellow-100 p-4 rounded shadow text-center">
                <h3 class="text-lg font-semibold text-yellow-800">Pending Lessons</h3>
                <p class="text-2xl mt-2 font-bold">7</p>
            </div>
        </div>
    </div>


     <div class="max-w-6xl mx-auto mt-3">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">All Courses</h2>

        @if($courses->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($courses as $course)
                    <div class="bg-white rounded shadow p-4 hover:shadow-lg transition">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="w-full h-32 object-cover rounded mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $course->title }}</h3>
                        <p class="text-sm text-gray-600 mb-2">By {{ $course->instructor->name ?? 'Instructor' }}</p>

                         <div class="flex justify-between items-center space-x-2">
                        <a href="{{ url('student/courses/' .$course->slug.'/show') }}"
                           class="mt-2 inline-block text-sm text-white bg-blue-600 px-3 py-1 rounded hover:bg-blue-700">
                            View details
                        </a> 
                    
                           @if(in_array($course->id, $enrolledCourseIds))
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Enrolled</span>
            @else
                            <form action = "{{ url('student/courses/'.$course->id.'/enroll') }}" Method = "POST">
                            @csrf
    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
        Enroll Now
    </button>
</form>
@endif
                         </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">You're not enrolled in any courses yet.</p>
        @endif
    </div>
@endsection
