@extends('instructor.layout')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow rounded-lg">
    <div class="flex justify-between items-center mb-6">
        {{-- <h2 class="text-2xl font-semibold text-gray-800">Lessons in Module: {{ $module->title }}</h2>
        <a href="{{ route('instructor.courses.modules.lessons.create', [$course, $module]) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Lesson</a> --}}
    </div>

    {{-- @if($lessons->count()) --}}
        <table class="min-w-full bg-white border rounded">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Title</th>
                    <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Type</th>
                    <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($lessons as $lesson)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 border-b">{{ $lesson->title }}</td>
                        <td class="px-6 py-4 border-b capitalize">{{ $lesson->type }}</td>
                        <td class="px-6 py-4 border-b">
                            <a href="{{ route('instructor.courses.modules.lessons.edit', [$course, $module, $lesson]) }}" class="text-blue-600 hover:underline mr-4">Edit</a>
                            <form action="{{ route('instructor.courses.modules.lessons.destroy', [$course, $module, $lesson]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">No lessons added yet.</p>
    @endif --}}
</div>
@endsection
