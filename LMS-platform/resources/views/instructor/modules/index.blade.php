@extends('instructor.layout')

@section('content')
<div class="flex justify-between items-center mb-4">
    {{-- <h2 class="text-xl font-bold">Modules for {{ $course->title }}</h2> --}}
    {{-- <a href="{{ route('instructor.courses.modules.create', $course) }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Add Module</a> --}}
</div>

<table class="w-full bg-white shadow rounded-lg">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3">Title</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>
    <tbody>
         {{-- @foreach($modules as $module)
        <tr class="border-t">
            <td class="p-3">{{ $module->title }}</td>
            <td class="p-3">
                <a href="{{ route('instructor.modules.lessons.index', $module) }}" class="text-indigo-600 hover:underline">View Lessons</a> |
                <a href="{{ route('instructor.courses.modules.edit', [$course, $module]) }}" class="text-blue-600 hover:underline">Edit</a> | --}}
                {{-- <form action="{{ route('instructor.courses.modules.destroy', [$course, $module]) }}" method="POST" class="inline"> --}}
                    {{-- @csrf @method('DELETE')
                    <button class="text-red-600 hover:underline">Delete</button>
                </form>
            </td> --}}
        {{-- </tr> --}}
        {{-- @endforeach --}} 
    </tbody>
</table>
@endsection
