@props(['title', 'author', 'rating', 'image', 'link' => '#'])

<div class="group relative flex flex-col w-[180px] shrink-0 snap-start">
    <div class="relative aspect-[2/3] w-full overflow-hidden rounded-lg shadow-lg transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-1">
        <img src="{{ $image }}" alt="{{ $title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
    </div>
    
    <div class="mt-3 space-y-1">
        <h3 class="font-heading text-base font-semibold text-white truncate" title="{{ $title }}">{{ $title }}</h3>
        <p class="text-sm text-gray-400 truncate">{{ $author }}</p>
        
        <div class="flex items-center gap-1">
            @for ($i = 0; $i < 5; $i++)
                <svg class="w-3 h-3 {{ $i < $rating ? 'text-orange-400 fill-current' : 'text-gray-600' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
            @endfor
        </div>
    </div>

    <a href="{{ $link }}" class="mt-3 w-full rounded-md bg-white/10 py-2 text-center text-sm font-medium text-white backdrop-blur-sm transition-colors hover:bg-white/20">
        Add to Library
    </a>
</div>
