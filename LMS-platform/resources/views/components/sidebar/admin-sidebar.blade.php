{{-- resources/views/components/sidebar/admin-sidebar.blade.php --}}
<aside class="w-64 bg-white shadow-md min-h-screen">
    <div class="p-4 text-2xl font-bold border-b">Admin Panel</div>
    <nav class="p-4 space-y-2 text-gray-700">
        <a href="{{ url('admin/dashboard') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Dashboard</a>
        <a href="{{ url('admin/users.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Users</a>
        <a href="{{ url('admin/roles.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Roles</a>
        <a href="{{ url('admin/permissions.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Permissions</a>
      
        {{-- Add more as needed --}}
    </nav>
</aside>
