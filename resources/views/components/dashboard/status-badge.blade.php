@props(['status', 'type' => 'info'])

@php
    $colors = [
        'success' => 'bg-green-100 text-green-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'error' => 'bg-red-100 text-red-800',
        'info' => 'bg-blue-100 text-blue-800',
        'gray' => 'bg-gray-100 text-gray-800',
    ];

    $colorClass = $colors[$type] ?? $colors['info'];
@endphp

<span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full {{ $colorClass }}">
    {{ $status }}
</span>
