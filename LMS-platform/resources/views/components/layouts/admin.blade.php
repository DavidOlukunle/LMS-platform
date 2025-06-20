{{-- resources/views/components/layout/admin.blade.php --}}
<div class="min-h-screen flex">
    {{-- Sidebar --}}
    <x-sidebar.admin-sidebar />

    {{-- Main Content --}}
    <div class="flex-1 bg-gray-100 p-6">
        {{ $slot }}
    </div>
</div>
