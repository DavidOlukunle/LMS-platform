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
            <th class="px-4 py-2 text-left text-sm">status</th>
            <th class="px-4 py-2 text-left text-sm">Department</th>
            <th class="px-4 py-2 text-left text-sm">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          
         @foreach($instructors as $instructor)
    <tr>
        <td>{{ $instructor->name }}</td>
        <td>{{ $instructor->email }}</td>
        <td>
            {{ $instructor->instructor->status ?? 'Not completed' }}
        </td>
        <td>
            {{ $instructor->instructor->department ?? 'N/A' }}
        </td>
        <td>
            @if(optional($instructor->instructor)->status !== 'approved')
                <form action="{{url('admin/instructor/'.$instructor->id. '/updateStatus')}}" method="POST">
                    @csrf
                    @method('PATCH')
                     <select name="status" class="border px-2 py-1 rounded">
        <option value="pending" {{ $instructor->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="approved" {{ $instructor->status == 'approved' ? 'selected' : '' }}>Approved</option>
        <option value="rejected" {{ $instructor->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
    </select>
    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Update</button>
                </form>
            @else
                <span class="text-green-500 font-semibold">Approved</span>
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
