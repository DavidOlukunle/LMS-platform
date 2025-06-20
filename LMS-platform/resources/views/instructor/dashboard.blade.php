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
        @forelse($courses as $course)
            <li>{{ $course->title }}</li>
        @empty
            <p class="text-gray-500">No courses yet.</p>
        @endforelse
    </ul>

    <form method="POST" action="{{ route('logout') }}" class="mt-10">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Log Out
        </button>
    </form>
</div>
@endsection
