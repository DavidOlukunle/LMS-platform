<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-6">
    <table class="min-w-full bg-white border border-gray-300 shadow-md">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">title</th>
                <th class="px-4 py-2">description</th>
               <th class="px-4 py-2">Level</th>
                <th class="px-4 py-2">status</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr class="text-center border-t">
                    <td class="px-4 py-2">{{$course->title}}</td>
                    <td class="px-4 py-2">{{$course->description}}</td>
                      <td class="px-4 py-2">{{$course->level}}</td>
                        <td class="px-4 py-2">{{$course->status}}</td>
            </tr>
                        @endforeach
        </tbody>
    </table>



    <div>
         <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
    </div>
</x-app-layout>
