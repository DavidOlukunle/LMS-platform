@extends('admin.layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Manage Instructor Courses</h1>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

   
    <!-- Filter Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <input type="text" id="filterName" placeholder="Filter by Instructor Name" class="p-2 border rounded w-full">
        <input type="text" id="filterCourse" placeholder="Filter by Course Title" class="p-2 border rounded w-full">
        <select id="filterStatus" class="p-2 border rounded w-full">
            <option value="">All Statuses</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>
    {{-- Courses Table --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Thumbnail</th>
                    <th class="px-6 py-3">Course Title</th>
                    <th class="px-6 py-3">Instructor</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                    <tr class="border-t hover:bg-gray-50 row-data">
                        <td class="px-6 py-3">
                            <img src="{{ asset('storage/' . $course->image) }}" alt="Thumbnail" class="w-16 h-10 object-cover rounded">
                        </td>
                        <td class="px-6 py-3 font-medium course-title">{{ $course->title }}</td>
                        <td class="px-6 py-3 instructor-name">{{ $course->instructor->name ?? 'N/A' }}</td>
                        <td class="px-6 py-3 course-status">
                            <span class="text-xs px-2 py-1 rounded 
                                {{ $course->status == 'published' 
                                    ? 'bg-green-100 text-green-800' 
                                    : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $course->status }}
                            </span>
                        </td>
                        <td class="px-6 py-3">

                            {{-- @if($course->status === 'draft') --}}
                                <form action="{{url('admin/instructor/'.$course->id.'/publishCourse')}}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">
                                        Publish
                                    </button>
                                </form>
                                {{-- @else --}}
                                <form action="{{url('admin/instructor/'.$course->id.'/unpublishCourse')}}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                        Unpublish
                                    </button>
                                </form>
                          
                                  {{-- @endif --}}
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center px-6 py-4 text-gray-500">No courses found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    const nameInput = document.getElementById("filterName")
    const courseInput = document.getElementById("filterCourse")
    const statusInput = document.getElementById("filterStatus")
    const rows = document.querySelectorAll('.row-data')
    
   function filterCourses() {
        const nameValue = nameInput.value.toLowerCase();
        const courseValue = courseInput.value.toLowerCase();
        const statusValue = statusInput.value.toLowerCase();

        rows.forEach(row => {
            const instructor = row.querySelector('.instructor-name').textContent.toLowerCase();
            const course = row.querySelector('.course-title').textContent.toLowerCase();
            const status = row.querySelector('.course-status').textContent.toLowerCase();

            const matchesName = instructor.includes(nameValue);
            const matchesCourse = course.includes(courseValue);
            const matchesStatus = statusValue === "" || status === statusValue;

            if (matchesName && matchesCourse && matchesStatus) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    nameInput.addEventListener('input', filterCourses);
    courseInput.addEventListener('input', filterCourses);
    statusInput.addEventListener('change', filterCourses);




    </script>
@endsection
