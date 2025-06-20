@extends('instructor.layout')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Instructor Registration</h2>

    @if (session('success'))
        <div class="mb-4 text-green-600 bg-green-100 p-3 rounded">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="mb-4 text-red-600 bg-red-100 p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('instructor/register') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Bio -->
        <div class="mb-4">
            <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Short Bio</label>
            <textarea name="bio" id="bio" rows="4" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tell us a bit about your teaching experience" required></textarea>
        </div>

         <div class="mb-4">
            <label for="department" class="block text-sm font-medium text-gray-700 mb-1">Department</label>
            <textarea name="department" id="bio" rows="" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tell us a bit about your teaching experience" required></textarea>
        </div>


        <!-- CV Upload -->
        <div class="mb-4">
            <label for="cv" class="block text-sm font-medium text-gray-700 mb-1">Upload CV (PDF)</label>
            <input type="file" name="credential_1" id="cv" accept=".pdf" class="w-full border border-gray-300 rounded-md px-4 py-2" required>
        </div>

        <!-- Certificate Upload -->
        <div class="mb-4">
            <label for="certificate" class="block text-sm font-medium text-gray-700 mb-1">Upload Certificate (PDF)</label>
            <input type="file" name="credential_2" id="certificate" accept=".pdf" class="w-full border border-gray-300 rounded-md px-4 py-2" required>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-200">
                Submit Application
            </button>
        </div>
    </form>
</div>
@endsection
