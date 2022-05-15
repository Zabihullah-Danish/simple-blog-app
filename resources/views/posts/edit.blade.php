<x-layouts.app>

    <x-slot name="sidebar">
        <div class="bg-gray-700 rounded p-2 m-2 ">
            <h1 class="text-white text-xl">Side bar title</h1>
            
        </div>
        
    </x-slot>
    
    <div class="bg-gray-700 shadow p-2 py-4 m-2 rounded flex flex-row justify-between">
        <h1 class="text-2xl text-white">Editing Post</h1>
        <a href="{{ route('posts.index') }}" class="bg-blue-600 p-2 text-white rounded" >Back</a>
    </div>

    @if(session('message'))
        <div class="p-2 mx-2 bg-green-500 text-white shadow rounded">
            {{ session('message') }}
        </div>
    @endif
    
    
    <div class="bg-gray-700 shadow p-2 m-2 rounded">
        <form action="{{ route('posts.update',$post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col p-1">

                <div class="flex flex-row justify-between space-y-2 mb-2 pl-2">

                    <div class="w-1/6 p-2">
                        <x-label for="category">
                            {{ __('Category') }}
                        </x-label>
                       
                    </div>
                    <div class="w-5/6">
                        <select name="category" class="w-full bg-gray-800 p-3 rounded text-white">
                            <option disabled>--Select Category--</option>
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select> 
                        @error('category')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror   
                    </div>

                </div>

                <div class="flex flex-row justify-between mb-2 pl-2">
                    <div class="w-1/6 p-2">
                        <x-label for="title">
                            {{ __('Title') }}
                        </x-label>
                       
                    </div>
                    <div class="w-5/6">
                        <x-input class="text-white" type="text" id="category" name="title" :value="$post->title" placeholder="Enter Title" />
                        @error('title')
                        <p class="text-red-600 pl-2">{{ $message }}</p>
                        @enderror
                    </div> 
                    
                </div>

                <div class="flex flex-row justify-between mb-2 pl-2">
                    <div class="w-1/6 p-2">
                        <x-label for="content">
                            {{ __('Content') }}
                        </x-label>
                       
                    </div>
                    <div class="w-5/6">
                        <x-textarea class="text-white" name="content" id="content" :value="$post->content" placeholder="Enter Content" rows="7" />
                        @error('content')
                        <p class="text-red-600 pl-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                </div>

                <div class="flex flex-row justify-between mb-2 pl-2">
                    <div class="w-1/6 p-2">
                        <x-label for="photo">
                            {{ __('Upload Photo') }}
                        </x-label>
                       
                    </div>
                    <div class="w-5/6">
                        <x-input class="text-white" type="file" id="photo" name="photo"  />
                        <img class="mt-2" src="{{ asset('storage/post_images/'.$post->post_image) }}" width="70" height="70" />
                        @error('image')
                        <p class="text-red-600 pl-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                </div>

                <div class="mb-2">
                    <div class="float-right pr-2 p-2">
                        <button class="p-2 bg-blue-600 hover:bg-blue-700 text-white rounded tracking-wider" type="submit">Update</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
    
</x-layouts.app>