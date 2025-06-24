<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-700">Student Portal</h1>
        <ul class="flex space-x-4 text-sm">
            <li><a href="{{ route('student.dashboard') }}" class="text-gray-700 hover:text-blue-600">Dashboard</a></li>
            <li><a href="#" class="text-gray-700 hover:text-blue-600">Courses</a></li>
            <li><a href="#" class="text-gray-700 hover:text-blue-600">Profile</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-red-600 hover:underline">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="p-6">
        @yield('content')
    </div>

</body>
</html>
