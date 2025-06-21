@extends('instructor.layout')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 shadow-md rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Edit Module</h2>
        <a href="{{ route('instructor.courses.modules.index', $course) }}" class="text-sm text-blue-600 hover:underline">← Back</a>
    </div>

    <form action="{{ route('instructor.courses.modules.update', [$course, $module]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Module Title</label>
            <input type="text" name="title" value="{{ old('title', $module->title) }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Update Module</button>
        </div>
    </form>
</div>
@endsection
