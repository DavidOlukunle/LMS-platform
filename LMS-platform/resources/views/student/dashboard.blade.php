@extends('student.layout')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Welcome, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-600">Here’s an overview of your learning progress.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-blue-100 p-4 rounded shadow text-center">
                <h3 class="text-lg font-semibold text-blue-800">Enrolled Courses</h3>
                <p class="text-2xl mt-2 font-bold">3</p>
            </div>
            <div class="bg-green-100 p-4 rounded shadow text-center">
                <h3 class="text-lg font-semibold text-green-800">Completed Modules</h3>
                <p class="text-2xl mt-2 font-bold">12</p>
            </div>
            <div class="bg-yellow-100 p-4 rounded shadow text-center">
                <h3 class="text-lg font-semibold text-yellow-800">Pending Lessons</h3>
                <p class="text-2xl mt-2 font-bold">7</p>
            </div>
        </div>
    </div>
@endsection
