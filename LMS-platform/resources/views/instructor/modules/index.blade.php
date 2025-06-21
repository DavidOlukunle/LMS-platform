@if(session('status'))
  <div class="max-w-md mx-auto mt-4">
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-md" role="alert">
      <span class="block sm:inline">{{ session('status') }}</span>
    </div>
  </div>
@endif