@props(['title', 'value', 'icon' => null, 'color' => 'indigo'])

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 transition-all duration-200 hover:shadow-md">
    <div class="flex items-center">
        @if($icon)
            <div class="p-3 rounded-full bg-{{ $color }}-100 text-{{ $color }}-600 mr-4">
                {{ $icon }}
            </div>
        @endif
        <div>
            <div class="text-gray-500 text-sm font-medium">{{ $title }}</div>
            <div class="text-3xl font-bold text-gray-800 mt-1">{{ $value }}</div>
        </div>
    </div>
</div>
