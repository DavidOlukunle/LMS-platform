@extends('admin.layout')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Welcome to the Admin Dashboard</h2>
    <p>Use the navigation bar to manage the LMS.</p>


    <div class="max-w-4xl mx-auto mt-8 bg-white shadow-md rounded-lg overflow-hidden">
  <div class="p-6 border-b border-gray-200 flex justify-between items-center">
    <h2 class="text-xl font-semibold text-gray-800">Role List</h2>
    <a href="{{ url('admin/roles/create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">Add Role</a>
  </div>

  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 font-semibold text-gray-600">#</th>
          <th class="px-6 py-3 font-semibold text-gray-600">Role Name</th>
          <th class="px-6 py-3 font-semibold text-gray-600">Actions</th>
        </tr>
      </thead>

        <tbody class="divide-y divide-gray-100">
        @foreach($roles as $role)
        <tr>
        <td>{{$role->id}}</td>
         <td>{{$role->name}}</td>
         <td><td class="px-6 py-4 flex space-x-2">
         <a href="{{ url('admin/roles/'.$role->id.'/give-permissions') }}"
               class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md text-sm">Add/Edit Role permission</a>

            <a href="{{ url('admin/roles/'.$role->id.'/edit') }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm">Edit</a>

               <a href="{{ url('admin/roles/'.$role->id.'/delete') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm">Delete</a>
               </td>
               </tr>
               @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection

@if(session('status'))
  <div class="max-w-md mx-auto mt-4">
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-md" role="alert">
      <span class="block sm:inline">{{ session('status') }}</span>
    </div>
  </div>
@endif

<!-- Tailwind-based Permission Card -->





 