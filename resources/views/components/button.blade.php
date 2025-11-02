<button {{ $attributes->merge(['class' => 'bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-3']) }}>
    {{ $slot }}
</button>