<!-- Sidebar Navigation -->
<div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-white shadow-lg fixed">
        <div class="p-6 text-2xl font-bold text-gray-700 border-b">
            Admin Panel
        </div>
        <nav class="mt-6 px-4 space-y-2 text-sm">
            <a href="{{ url('admin/dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Dashboard</a>
            <a href="{{ url('admin/roles') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Roles</a>
            <a href="{{ url('admin/permissions') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Permissions</a>
            <a href="{{ url('admin/users') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Users</a>
            <a href="{{ url('admin/instructor/courses') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Courses</a>
            <a href="{{ url('admin/instructors') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Instructors</a>
            <a href="{{ url('admin/reports') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Reports & Analytics</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-6">
                @csrf
                <button class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100 rounded">Logout</button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="ml-64 w-full p-6">
        @yield('content')
    </div>
</div>
