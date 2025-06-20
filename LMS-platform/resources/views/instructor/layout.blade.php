
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Instructor Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow px-6 py-4 mb-6">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold">Instructor Dashboard</h1>
      <ul class="flex space-x-4">
        <li><a href="{{ url('instructor/courses/create') }}" class="text-blue-600 hover:underline">create new course</a></li>
        <li><a href="{{ url('instructor/register') }}" class="text-blue-600 hover:underline">register</a></li>
        <li><a href="{{ route('logout') }}" class="text-red-500 hover:underline"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
      </ul>
    </div>
  </nav>

  <!-- Logout form -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
  </form>

  <!-- Content Area -->
  <div class="container mx-auto px-4">
    @yield('content')
  </div>

</body>
</html>
