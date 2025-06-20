@extends('admin.layout')

@section('content')
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Admin Dashboard Overview</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-sm font-semibold text-gray-500">Total Courses</h3>
            <p class="text-2xl font-bold text-blue-600 mt-2">12</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-sm font-semibold text-gray-500">Total Instructors</h3>
            <p class="text-2xl font-bold text-green-600 mt-2">5</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-sm font-semibold text-gray-500">Total Students</h3>
            <p class="text-2xl font-bold text-purple-600 mt-2">148</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Activities</h3>
        <ul class="list-disc list-inside text-sm text-gray-700">
            <li>New course "Laravel Basics" created by John Doe</li>
            <li>Instructor Jane approved</li>
            <li>User David Olukunle signed up</li>
        </ul>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Quick Actions</h3>
        <div class="flex space-x-4">
            <a href="{{ url('admin/courses/create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Course</a>
            <a href="{{ url('admin/users/create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add Instructor</a>
        </div>
    </div>

    @endsection


