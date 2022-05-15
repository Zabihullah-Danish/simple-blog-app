<x-layouts.guest>
    <x-slot name='title'>
        {{ __('Login') }}
    </x-slot>
    <x-auth-card class="">

        <div>
            <x-logo class="mx-auto" />
        </div>

        @error('loginError')
            <div class="text-red-600 mt-3 pl-2">
                {{ $message }}
            </div>
        @enderror

        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <div class="mt-3">
                <x-label for="email">
                    {{ __('Email') }}
                </x-label>
                <x-input type="email" name="email" placeholder="Enter Email" />
                @error('email')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>

            <div class="mt-3">
                <x-label for="password">
                    {{ __('Password') }}
                </x-label>
                <x-input type="password" name="password" placeholder="Enter Password" />
            </div>

            <div class="mt-3 flex flex-row">
                <input class="mx-1" type="checkbox" group="five" name="remember" />
                <x-label group="five" for="remember">
                    {{ __('Remember me') }}
                </x-label>
            </div>

            <div class="mt-3">
                <x-button type="submit" class="bg-green-600 hover:bg-green-700 text-white rounded w-full p-2">
                    {{ __('Login') }}
                </x-button>
            </div>
        </form>
        <div class="mt-2">
            <span class="pl-2 text-sm text-400">Don't have account </span><a class="text-blue-500 hover:text-blue-600 text-sm font-bold" href="{{ route('register') }}">Register</a>
        </div>

    </x-auth-card>
</x-layouts.guest>