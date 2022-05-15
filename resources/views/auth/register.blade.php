<x-layouts.guest>
    <x-slot name="title">
        {{ __('Register') }}
    </x-slot>
    <x-auth-card class="overflow-y-auto">
        {{-- logo --}}
        <div>
            <x-logo class=" mx-auto" />
        </div>

        <form action="{{ route('store') }}" method="post">
            @csrf
            <div>
                <x-label for="name">
                    {{ __('Name') }}
                </x-label>
                <x-input type="text" name="name" placeholder="Enter Name" />
                @error('name')
                    <div class="text-red-600 text-sm">
                        {{ $message }}
                    </div>
                   
                @enderror
            </div>

            <div class="mt-3">
                <x-label for="email">
                    {{ __('Email') }}
                </x-label>
                <x-input type="email" name="email" placeholder="Enter Email" />
                @error('email')
                    <div class="text-red-600 text-sm">
                        {{ $message }}
                    </div>
                   
                @enderror
            </div>

            <div class="mt-3">
                <x-label for="password">
                    {{ __('Password') }}
                </x-label>
                <x-input type="password" name="password" placeholder="Enter Password" />
                @error('password')
                    <div class="text-red-600 text-sm">
                        {{ $message }}
                    </div>
                   
                @enderror
            </div>

            <div class="mt-3">
                <x-label for="password_confirmation">
                    {{ __('Confirm Password') }}
                </x-label>
                <x-input type="password" name="password_confirmation" placeholder="Retyp password" />
            </div>

            <div class="mt-3">
                <x-button class="bg-green-700 hover:bg-green-800 text-white w-full p-2 rounded" type="submit" >
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        <div class="mt-2">
            <span class="pl-2 text-sm text-gray-400 ">Already registered </span><a class="text-sm text-blue-500 hover:text-blue-600 font-bold" href="{{ route('login') }}">Login</a>
        </div>


    </x-auth-card>
</x-layouts.guest>