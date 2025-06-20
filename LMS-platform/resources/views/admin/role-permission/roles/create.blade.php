<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Roles</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

  <div class="max-w-4xl mx-auto mt-10 px-4">
    <div class="bg-white rounded-lg shadow-md">
      <!-- Header -->
      <div class="flex justify-between items-center px-6 py-4 border-b">
        <h4 class="text-2xl font-semibold text-gray-800">Roles</h4>
        <a href="{{ url('admin/roles') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200">
          Back
        </a>
      </div>

      <!-- Form Section -->
      <div class="px-6 py-6">
        <h2 class="text-xl font-bold mb-4 text-gray-700">Add Role</h2>

        <form action="{{ url('admin/roles') }}" method="POST" class="space-y-4">
          @csrf

          <!-- Role Name Input -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Role Name</label>
            <input
              type="text"
              id="name"
              name="name"
              placeholder="Enter role name"
              class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
              required
            />
          </div>

          <!-- Submit Button -->
          <div>
            <button
              type="submit"
              class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200"
            >
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
