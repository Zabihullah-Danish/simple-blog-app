<x-layouts.app>

    <x-slot name="sidebar">
        <div class="bg-gray-700 rounded p-2 m-2 ">
            <h1 class="text-white text-xl">Mostly Liked Posts</h1>
        </div>

        <div class="bg-gray-700 rounded p-2 m-2">
            <h1 class="text-white text-xl">Trashed Posts</h1>
                @foreach($trashedPost as $post)
                <div class="flex flex-row justify-between">
                    <p class="text-white p-2 hover:bg-gray-600 rounded-md cursor-pointer">
                    {{ $post->title }}
                    </p>
                    <a class="bg-blue-600 rounded p-1 mb-0.5 text-white" href="{{ route('trashedPost',$post) }}" >Undo</a>
                </div>
                    <hr>
                @endforeach
            
        </div>
        
    </x-slot>
    
    <div class="bg-gray-700 shadow p-2 py-4 m-2 rounded flex flex-row justify-between">
        <h1 class="text-2xl text-white">Post Management</h1>
        <a class="bg-blue-600 p-2 text-white rounded" href="{{ route('posts.create') }}">Create Post</a>
    </div>
    @if(session('message'))
        <div class="p-2 mx-2 bg-green-500 text-white shadow rounded">
            {{ session('message') }}
        </div>
    @endif
    @if(session('delete'))
        <div class="p-2 mx-2 bg-red-500 text-white shadow rounded">
            {{ session('delete') }}
        </div>
    @endif

    <div class="bg-gray-700 shadow p-2 m-2 rounded">
        @forelse ($posts as $post)
            <div class="flex flex-row justify-between m-2 bg-gray-800 hover:bg-gray-900 rounded">
                <div class="">
                    <a class="text-gray-300 p-2 block" href="{{ route('posts.show',$post) }}">{{ $post->title }}</a>
                </div>
                <div class="rounded overflow-hidden flex flex-row">
                    <a class="p-2 inline-block bg-gray-500 hover:bg-gray-600 text-white" href="{{ route('posts.show',$post) }}">View</a>
                    <a class="p-2 -ml-2 inline-block bg-blue-600 hover:bg-blue-700 text-white" href="{{ route('posts.edit',$post) }}">Edit</a>
                    <form action="{{ route('posts.destroy',$post) }}" onsubmit="return confirm('Are you sure to delete?')" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="p-2 -ml-2 inline bg-red-600 hover:bg-red-700 text-white ">Delete</button>
                    </form>
                </div>
                
                
            </div>
        @empty
            <div class="m-2 bg-gray-900 text-white rounded">
                <p class="p-2">Didn't make any post ye!</p>
            </div>
        @endforelse
    </div>
    
</x-layouts.app>