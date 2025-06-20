@extends('admin.layout')

@section('content')
<div class="max-w-7xl mx-auto mt-10 px-4">
  <div class="bg-white rounded-lg shadow-md">

    <!-- Header -->
    <div class="flex justify-between items-center px-6 py-4 border-b">
      <h2 class="text-2xl font-semibold text-gray-800">Instructors</h2>
      <a href="{{ url('admin/instructors/create') }}"
         class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200">
        Add Instructor
      </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto px-6 py-4">
      <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="px-4 py-2 text-left text-sm">Name</th>
            <th class="px-4 py-2 text-left text-sm">Email</th>
            <th class="px-4 py-2 text-left text-sm">Department</th>
            <th class="px-4 py-2 text-left text-sm">Status</th>
            <th class="px-4 py-2 text-left text-sm">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          
          @foreach ($instructors as $instructor)
            
          <tr class="border-t">
            <td class="px-4 py-2">{{ $instructor->name }}</td>
            <td class="px-4 py-2">{{ $instructor->email }}</td>
            {{-- <td class="px-4 py-2">{{ $instructor->department ?? 'N/A' }}</td> --}}
            <td class="px-4 py-2">
              @if ($instructor->status === 'approved')
                <span class="text-green-600 font-semibold">Approved</span>
              @elseif ($instructor->status === 'pending')
                <span class="text-yellow-600 font-semibold">Pending</span>
              @else
                <span class="text-red-600 font-semibold">Suspended</span>
              @endif
            </td>
            <td class="px-4 py-2 space-x-2">
              <a href="{{ url('admin/instructors/' . $instructor->id . '/edit') }}"
                 class="text-blue-600 hover:underline text-sm">Edit</a>
              <form action="{{ url('admin/instructors/' . $instructor->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline text-sm"
                        onclick="return confirm('Are you sure?')">Delete</button>
              </form>
              @if ($instructor->status === 'pending')
              <form action="{{ url('admin/instructors/' . $instructor->id . '/approve') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-green-600 hover:underline text-sm">Approve</button>
              </form>
              @endif
            </td>
          </tr>
         
          @endforeach
        </tbody>
      </table>

      <!-- Pagination -->
      <div class="mt-4">
        {{-- {{ $instructors->links() }} --}}
      </div>
    </div>

  </div>
</div>
@endsection
