<div {{ $attributes->merge(['class' => 'min-h-screen bg-gray-900 py-14']) }}>
    <div class="flex flex-col px-5 py-4 border-4 border-gray-800 rounded-md bg-gray-900 text-white w-2/6 mx-auto shadow">
        {{ $slot }}
    </div>
</div>