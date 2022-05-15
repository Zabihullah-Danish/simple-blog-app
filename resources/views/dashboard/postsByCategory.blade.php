<x-layouts.app>

    <x-slot name="sidebar">
        <div class="bg-gray-700 rounded p-2 m-2 ">
            <h1 class="text-white text-xl">Other Categories</h1>
            
        </div>
        
    </x-slot>
    
    <div class="bg-gray-700 shadow p-2 py-4 m-2 rounded flex flex-row justify-between">
        <h1 class="text-2xl text-white">{{ $category->name }}'s category posts</h1>
        <button class="bg-blue-600 px-2 py-1 text-white rounded" onclick="goBack()">Back</button>
    </div>
    
    <div class="bg-gray-700 shadow p-2 m-2 rounded">
        @foreach ($posts as $post)
            <a href="{{ route('postDetails',$post->id) }}">
                <div class="flex flex-col p-1 m-2 shadow bg-gray-800 hover:bg-gray-900 rounded">
                    <p class="text-white pl-2 py-1">{{ $post->title }}</p>
                </div>
            </a>
        @endforeach
    </div>
    
</x-layouts.app>