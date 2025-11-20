@props(['title', 'description' => null])

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">{{ $title }}</h2>
        @if($description)
            <p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
        @endif
    </div>
    @if(isset($actions))
        <div class="mt-4 sm:mt-0 flex space-x-3">
            {{ $actions }}
        </div>
    @endif
</div>
