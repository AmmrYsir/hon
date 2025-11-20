<x-app-layout>
    <div class="space-y-8">
        <!-- Welcome Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800">Welcome back, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-600 mt-2">Ready to find your next adventure?</p>
        </div>

        <!-- My Rentals -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <x-dashboard.section-header 
                title="My Current Rentals" 
                description="Books you are currently reading."
            />

            @if($myRentals->isEmpty())
                <x-dashboard.empty-state 
                    title="No active rentals" 
                    description="You haven't rented any books yet. Browse our collection to find something to read."
                />
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($myRentals as $rental)
                        <div class="border rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                            <h3 class="font-bold text-lg text-gray-900">{{ $rental->book->title }}</h3>
                            <p class="text-sm text-gray-600 mt-1">Due: {{ $rental->due_date->format('M d, Y') }}</p>
                            <button class="mt-4 w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition-colors duration-200 font-medium">Read Now</button>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Recommended Books -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <x-dashboard.section-header 
                title="New Arrivals" 
                description="Check out the latest additions to our library."
            />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($books as $book)
                    <div class="border rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200 group">
                        <div class="h-48 bg-gray-200 flex items-center justify-center group-hover:bg-gray-300 transition-colors duration-200">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-gray-900 truncate" title="{{ $book->title }}">{{ $book->title }}</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ $book->author->name }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-indigo-600 font-bold">${{ $book->price }}</span>
                                <a href="{{ route('books.show', $book) }}" class="text-sm bg-gray-800 text-white px-3 py-1 rounded hover:bg-gray-700 transition-colors duration-200">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
