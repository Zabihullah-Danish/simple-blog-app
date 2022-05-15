
<div class="flex flex-row justify-between p-2">
    <ul class="flex flex-row space-x-4">
        <li><a class="border inline-block rounded-md" href="{{ route('dashboard') }}"><x-logo /></a></li>
        <li><a class="p-3 bg-gray-800 inline-block rounded" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a class="p-3 hover:bg-gray-800 inline-block rounded" href="{{ route('posts.index') }}">My Posts</a></li>
        <li><a class="p-3 hover:bg-gray-800 inline-block rounded" href="">About</a></li>
        <li><a class="p-3 hover:bg-gray-800 inline-block rounded" href="">Contact</a></li>
        <li><a class="p-3 hover:bg-gray-800 inline-block rounded" href="">Phone</a></li>
    </ul>
    <ul class="flex flex-row">
        @if(Auth::check())
            @auth
                <li class="p-3 rounded text-white">{{ Auth::user()->name }}</li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <x-button type="submit" class="px-3 py-3 bg-gray-800 text-white rounded-full">
                            {{ __('Logout') }}
                        </x-button>
                    </form>
                </li> 
            @endauth
        @else
            <li><a class="px-3 py-3 hover:bg-gray-800 inline-block hover:text-white rounded" href="{{ route('login') }}">Login</a></li>
        @endif
    </ul>
    
</div>