<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Create New Course</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('instructor.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-indigo-200" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-indigo-200"
                required>{{ old('description') }}</textarea>
        </div>

        <!-- Level -->
        <div class="mb-4">
            <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
            <select name="level" id="level"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-indigo-200" required>
                <option value="">-- Select Level --</option>
                <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
            </select>
        </div>

        <!-- Image -->
        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700">Course Image</label>
            <input type="file" name="image" id="image"
                class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-indigo-200">
        </div>

        
        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-indigo-700 transition">
                Create Course
            </button>
        </div>
    </form>
</div>
</x-app-layout>
