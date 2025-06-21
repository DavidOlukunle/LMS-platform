@extends('instructor.layout')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Create New Lesson</h2>
        {{-- <a href="{{ route('instructor.courses.modules.lessons.index', [$course, $module]) }}" class="text-sm text-blue-600 hover:underline">← Back</a>
    </div> --}}

    {{-- <form action="{{ route('instructor.courses.modules.lessons.store', [$course, $module]) }}" method="POST" enctype="multipart/form-data"> --}}
        
        <form>
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Lesson Title</label>
            <input type="text" name="title" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Lesson Type</label>
            <select name="type" class="w-full border px-4 py-2 rounded">
                <option value="video">Video</option>
                <option value="pdf">PDF</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Upload File</label>
            <input type="file" name="file" class="w-full border px-4 py-2 rounded">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-1">Lesson Description</label>
            <textarea name="description" rows="4" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring"></textarea>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Create Lesson</button>
        </div>
    </form>
</div>
@endsection
