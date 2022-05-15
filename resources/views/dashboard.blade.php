<x-layouts.app>

    <x-slot name="sidebar">
        <div class="bg-gray-700 rounded p-2 m-2 ">
            <h1 class="text-white text-xl">Posts by categories</h1>
            <div class="pl-1">
                @foreach ($categories as $category)
                    <a class="" href="{{ route('postsByCategory',$category) }}">
                        <p class="text-gray-300 hover:bg-gray-900 pl-1 py-1 rounded">{{ $category->name }} (<span class="text-blue-500">{{ $category->posts->count() }}</span>)</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="bg-gray-700 rounded p-2 m-2">
            <h1 class="text-xl text-white">Posts by Users</h1>
            <div class="pl-1">
                @foreach ($users as $user)
                    <a href="{{ route('postsByUser',$user) }}">
                        <p class="text-gray-300 hover:bg-gray-900 pl-1 py-1 rounded">{{ $user->name }} (<span class="text-blue-500">{{ $user->posts->count() }}</span>)</p>
                    </a>
                    @endforeach
            </div>
        </div>
    </x-slot>
    
    <div class="bg-gray-700 shadow p-2 py-4 m-2 rounded">
        <h1 class="text-2xl text-white">All Posts</h1>
    </div>
    <div class="grid grid-cols-2 grid-flow-row">

        @foreach($posts as $post)
            <div>
                <a href="{{ route('postDetails',$post->id) }}" >
                    <div class="flex flex-col transition-all delay-50 bg-gray-700 hover:bg-gray-900 text-white m-2 rounded shadow h-80">
                        <div class="h-48 overflow-hidden hover:opacity-50">
                            <img src="{{ asset('storage/post_images/'.$post->post_image) }}" width="1000%" />
                        </div>
                        <div class="h-20 p-2">
                            {{ $post->title }}
                        </div>
                        <div class="flex flex-row justify-between">
                            <div class="text-xs text-gray-400 text-mono pt-6 pl-1 h-12">
                                {{ $post->created_at->diffForHumans() }}
                            </div>
                           
                            <div class="text-xs text-gray-400 text-mono pt-6 pr-1 h-12">
                                <p>
                                    @foreach($categories as $category)
                                        @if($post->category_id == $category->id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        
                        
                    </div>
                </a>
                <div>
                    <button>Like</button>
                </div>
            </div>
            
        @endforeach
        
    </div>

    <div class="bg-gray-900 shadow p-2 m-2 rounded">
        <div class="p-0 text-white">
            {{ $posts->links() }}
        </div>
    </div>
</x-layouts.app>