@extends('instructor.layout')

@section('content')
<div class="max-w-5xl mx-auto bg-white rounded-lg shadow p-6">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center space-x-4">
          
            <img src="" alt="Instructor Image" class="w-24 h-24 rounded-full object-cover shadow">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-gray-500">Instructor</p>
            </div>
        </div>
        <a href="{{ url('') }}" class="text-blue-600 hover:underline">Edit Profile</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
      @foreach($instructors as $instructor)
        <div>
            <h3 class="font-semibold text-gray-700">Bio</h3>
            <p class="text-gray-600">{{ $instructor->bio ?? 'N/A' }}</p>
        </div>
        <div>
            <h3 class="font-semibold text-gray-700">Department</h3>
            <p class="text-gray-600">{{ $instructor->department ?? 'N/A' }}</p>
        </div>
        <div>
            <h3 class="font-semibold text-gray-700">Status</h3>
            <span class="inline-block px-3 py-1 rounded-full text-sm font-medium 
              @if($instructor->status === 'approved') bg-green-100 text-green-800 
              @elseif($instructor->status === 'pending') bg-yellow-100 text-yellow-800 
              @else bg-red-100 text-red-800 
              @endif">
              {{ ucfirst($instructor->status) }}
            </span>
        </div>
        <div>
            <h3 class="font-semibold text-gray-700">Certificate</h3>
            @if($instructor->credential_1)
                <a href="{{ asset('storage/' . $instructor->credential_1) }}" target="_blank" class="text-blue-600 hover:underline">View Certificate</a>
            @else
                <p class="text-gray-500">Not uploaded</p>
            @endif
        </div>
        @endforeach
    </div>

    <hr class="my-6">

    <h3 class="text-xl font-semibold mb-4">Your Courses</h3>
    <ul class="list-disc list-inside text-gray-700 space-y-2">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($courses as $course)
            <div class="bg-white shadow rounded-lg p-4 flex flex-col items-center text-center">
                <!-- Thumbnail -->
                <div class="w-full h-40 bg-gray-200 overflow-hidden rounded mb-4">
                    <img src="{{ $course->image ? asset('storage/' . $course->image) : 'https://via.placeholder.com/300x200' }}" 
                         alt="{{ $course->title }}" 
                         class="object-cover w-full h-full">
                </div>

                <!-- Title -->
                <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $course->title }}</h3>

                <!-- Status -->
                <p class="text-sm text-blue-600 font-medium capitalize mb-1">
                    Status: {{ $course->status }}
                </p>

                <!-- Description -->
                <p class="text-sm text-gray-600 mb-4">
                    {{ Str::limit($course->description, 80) }}
                </p>

                <!-- View Button -->
                <a href="{{ url('instructor/courses/'. $course->id) }}" 
                   class="text-sm bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    View Details
                </a>
            </div>
        @empty
            <p class="text-gray-600">You haven't created any courses yet.</p>
        @endforelse
      </div>
    </ul>

    <div class="mt-3">
    @if($instructor->status === 'approved')
        <button  class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"><a href = "{{url('instructor/courses/create')}}">
            create new course</a>
        </button>
        @else
    <div class="relative group inline-block">
        <button class="bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed" disabled>
            Create New Course
        </button>
        <div class="absolute top-full mt-1 left-0 bg-black text-white text-xs rounded px-2 py-1 hidden group-hover:block">
            You have not been approved yet.
        </div>
    </div>

    @endif
</div>
</div>




<script>
    let paragraph = document.getElementById('response')
    let btn = document.getElementById('button')

    btn.addEventListener("click", () => 
    paragraph.innerHTML = "you are yet to be verified"
)

    

    </script>
@endsection
