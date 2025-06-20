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
             <td class="px-4 py-2 text-blue-600 font-bold"> <a href = "{{ url('/admin/instructor/'.$instructor->id. '/view-instructor') }}"> {{ $instructor->name }} </a> </td>
            <td class="px-4 py-2">{{ $instructor->email }}</td>
             @endforeach

             @foreach($instructorDetails as $details)
            <td class="px-4 py-2">{{ $details->department ?? 'N/A' }}</td>
            <td class="px-4 py-2">
              @if ($details->status === 'approved')
                <span class="text-green-600 font-semibold">Approved</span>
              @elseif ($details->status === 'pending')
                <span class="text-yellow-600 font-semibold">Pending</span>
              @else
                <span class="text-red-600 font-semibold">Suspended</span>
              @endif
            </td>

            @endforeach

<td class="px-4 py-2">
    <form action="{{ url('admin/instructor/'. $instructor->id .'/updateStatus') }}" method="POST">
        @csrf
        @method('PATCH')
        <select name="status" onchange="this.form.submit()"
            class="border border-gray-300 rounded px-3 py-1 text-sm text-gray-700 focus:outline-none focus:ring focus:border-blue-500">
            <option value="accepted" {{ $instructor->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
            <option value="suspended" {{ $instructor->status === 'suspended' ? 'selected' : '' }}>Suspended</option>
        </select>
    </form>
</td>

          </tr>
         
          
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
