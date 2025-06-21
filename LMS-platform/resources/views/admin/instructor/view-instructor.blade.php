

@extends('admin.layout')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
    <div class="flex items-center space-x-6 mb-6">
        <div class="w-24 h-24">
            <img class="rounded-full w-full h-full object-cover" 
                 src="{{  'https://ui-avatars.com/api/?name=' . urlencode($instructor->name) }}" 
                 alt="Profile photo">
        </div>
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">{{ $instructor->name }}</h2>
            <p class="text-gray-600">{{ $instructor->email }}</p>

            @foreach($instructorDetails as $details)
            <span class="inline-block mt-1 px-3 py-1 text-sm rounded-full 
                         {{ $details->status === 'accepted' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                {{ ucfirst($details->status) }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-gray-700 font-medium mb-1">Department</h3>
            <p class="text-gray-600">{{ $details->department ?? 'N/A' }}</p>
        </div>
        <div>
            <h3 class="text-gray-700 font-medium mb-1">Bio</h3>
            <p class="text-gray-600">{{ $details->bio ?? 'No bio provided.' }}</p>
        </div>
    </div>

    <div class="mt-8">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Certifications</h3>
      @if($details->credential_1 || $details->credential_2)
                <a href="{{ asset('storage/' . $details->credential_1) }}" target="_blank" class="text-blue-600 hover:underline">View Certifications 1</a><br>
                 <a href="{{ asset('storage/' . $details->credential_2) }}" target="_blank" class="text-blue-600 hover:underline">View Certifications 2</a>
            @else
                <p class="text-gray-500">Not uploaded</p>
            @endif
    @endforeach

    <div class="mt-6">
        <a href="{{ url('') }}" class="text-blue-600 hover:underline text-sm">
            ← Back to Instructor List
        </a>
    </div>
</div>
@endsection

