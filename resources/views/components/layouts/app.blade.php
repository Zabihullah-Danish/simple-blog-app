<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <title>{{ $title ?? 'Blog' }}</title>
</head>
<body class="overflow-y-scroll">

    {{-- navigation bar --}}
    {{-- sticky inset-0 --}}
    <div class="bg-gray-900 ">
        <nav class="container max-w-6xl mx-auto bg-gray-900 text-white">
            <x-navbar />
        </nav>
    </div>

    {{-- main content --}}
    <main class="container max-w-6xl mx-auto p-1 bg-gray-800 min-h-screen">
        <div class="flex flex-row">
            <div class="w-9/12 p-2 flex flex-col">
                {{ $slot }}
            </div>
            <div class="w-3/12 p-2">
                {{ $sidebar }}
            </div>
        </div>
        
    </main>

    {{-- footer --}}
    <div class="bg-gray-900 text-white">
        <footer class="container max-w-6xl mx-auto p-2">
            <x-footer />
        </footer>
    </div>
        <script>
            function goBack() {
            window.history.back();
            }
        </script>
    
</body>
</html>