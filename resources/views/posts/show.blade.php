<x-layouts.app>

    <x-slot name="sidebar">
        <div class="bg-gray-700 rounded p-2 m-2 ">
            <h1 class="text-white text-xl">Mostly Liked Posts</h1>
            
        </div>
        
    </x-slot>
    
    <div class="bg-gray-700 shadow p-2 py-4 m-2 rounded flex flex-row justify-between">
        <h1 class="text-2xl text-white">{{ $post->title }}</h1>
        <button onclick="goBack()" class="bg-blue-600 p-2 text-white rounded">Back</button>
    </div>

    <div class="bg-gray-700 shadow p-2 m-2 rounded flex flex-col space-y-3">

        <div class="flex flex-row justify-between">
            <div class="p-2">
                <p class="text-gray-400 text-xs">{{ $post->created_at }}</p>
            </div>
            <div class="p-2">
                <p class="text-gray-200">{{ $category->name }}</p>
            </div>
        </div>

        <div>
            <p class="text-white">{{ $post->content }}</p>
        </div>
        
        <div>
            <img src="{{ asset('storage/post_images/'.$post->post_image) }}" width="100%" />
        </div>


    </div>
    
</x-layouts.app>