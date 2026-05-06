@props(['type' => 'primary'])

@php
    $classes = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white',
        'success' => 'bg-green-600 hover:bg-green-700 text-white',
        'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white',
    ][$type] ?? 'bg-blue-600 text-white';
@endphp

<button {{ $attributes->merge(['class' => "rounded px-4 py-2 text-sm font-medium $classes"]) }}>
    {{ $slot }}
</button>