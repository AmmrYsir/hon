@props(['title', 'link' => '#', 'linkText' => 'View All'])

<div class="flex items-center justify-between mb-6">
    <h2 class="font-heading text-xl font-bold text-white">{{ $title }}</h2>
    @if($link)
        <a href="{{ $link }}" class="text-sm font-medium text-blue-400 hover:text-blue-300 transition-colors">{{ $linkText }}</a>
    @endif
</div>
