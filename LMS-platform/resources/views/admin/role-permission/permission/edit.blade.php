<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Permissions</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>


<div class = "container">
<div class = 'row'>
<div class = "col-md-12">
<div class = 'card'>
<div class= 'card-header'>
<h4>Permissions
<a href = "{{url('permissions')}}" class = "btn btn-primary float-end">Back</a>
</h4>
</div>


<!-- Form Section -->
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
  <h2 class="text-xl font-bold mb-4 text-gray-800">Edit Permission</h2>

  <form action="{{ url('permissions/'.$permission->id) }}" method="POST">
  
    @csrf
    @method("PUT")

    <!-- Permission Name Input -->
    <div class="mb-4">
      <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Permission Name</label>
      <input
        type="text"
        id="name"
        name="name"
        value = "{{$permission->name}}"
        placeholder="Enter permission name"
        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
      />
    </div>

  
    <div>
      <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200"
      >
        update
      </button>
    </div>
  </form>
</div>



 