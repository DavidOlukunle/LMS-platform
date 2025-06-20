<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Roles</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
  <div class="max-w-4xl mx-auto mt-8 px-4">
    <div class="bg-white shadow-md rounded-xl overflow-hidden">

      @if(session('status'))
  <div class="max-w-md mx-auto mt-4">
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-md" role="alert">
      <span class="block sm:inline">{{ session('status') }}</span>
    </div>
  </div>
@endif
      
      <!-- Header -->
      <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 bg-gray-50">
        <h4 class="text-xl font-semibold text-gray-800">Role: {{ $role->name }}</h4>
        <a href="{{ url('admin/roles') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700 transition">Back</a>
      </div>

      <!-- Form Section -->
      <div class="p-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Edit Role Permissions</h2>

        <form action="{{ url('admin/roles/'.$role->id.'/give-permissions') }}" method="POST">
          @csrf
          @method("PUT")

          <!-- Permission Checkboxes -->
          <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Permissions</label>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
              @foreach($permissions as $permission)
                <label class="inline-flex items-center space-x-2 bg-gray-50 border border-gray-200 rounded-md px-3 py-2 hover:bg-gray-100">
                  <input
                    type="checkbox"
                    name="permission[]"
                    value="{{ $permission->name }}"
                    {{in_array($permission->id, $rolePermissions) ? 'checked' : ""}}
                    class="text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                    {{ $role->permissions->contains($permission) ? 'checked' : '' }}
                  >
                  <span class="text-gray-700">{{ $permission->name }}</span>
                </label>
              @endforeach
            </div>
          </div>

          <!-- Submit Button -->
          <div>
            <button
              type="submit"
              class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition"
            >
              Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
