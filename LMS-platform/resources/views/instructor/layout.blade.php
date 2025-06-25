<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Instructor Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">

  <!-- Navbar -->
  <nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-2">
        <h1 class="text-2xl font-bold text-gray-800">Instructor Dashboard</h1>
      </div>
      <ul class="flex items-center space-x-6 text-sm font-medium">
        
        
        @foreach ($instructors as $instructor)
       
        
          @if($instructor->status === 'approved')
            <li>
              <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                Approved Instructor
              </span>
            </li>
            <li>
              <a href="{{ url('instructor/courses/create') }}"
                 class="text-blue-600 hover:text-blue-800 transition">Create New Course</a>
            </li>
          @elseif($instructor->status === 'pending' || $instructor->status === 'suspended')
            <li>
              <span class="inline-block bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                Awaiting Approval
              </span>
            </li>
            
          
          @endif
        
        @endforeach

        <li>
          <a href="{{ route('logout') }}"
             class="text-red-500 hover:text-red-700"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Logout form -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
  </form>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto px-4 py-8">
    @yield('content')
  </main>

</body>
</html
