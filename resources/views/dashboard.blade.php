<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
       {{--  if flash session succes then show message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }} {{Auth::user()->name}}
                   {{-- check if $files collection is emty --}}
                   @if($files->count() > 0)
                       @foreach($files as $file)
                           <li><a href="{{ asset('storage/'.$file->path)}}" target="_blank">FILE: </a>{{$file->name}}</li>
                           
                        @endforeach
                    @else
                        <hr>
                       <x-danger-button class="mt-6">No files found</x-danger-button>
                    @endif
                   <form class="mt-6" method="POST" action="/your-upload-route" enctype="multipart/form-data">
                        @csrf
                        <x-text-input type="file" name="my_file" placeholder="Upload File" />
                        <x-text-input type="text" name="name" placeholder="Enter File Description" />
                        <x-primary-button>Upload</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
