<x-app-layout>
    <div class="space-y-6">
        <!-- Welcome Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold text-gray-800">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-600 mt-2">Ready to find your next adventure?</p>
            </div>
        </div>

        <!-- My Rentals -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">My Current Rentals</h2>
                @if($myRentals->isEmpty())
                    <p class="text-gray-500">You haven't rented any books yet.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($myRentals as $rental)
                            <div class="border rounded-lg p-4">
                                <h3 class="font-bold text-lg">{{ $rental->book->title }}</h3>
                                <p class="text-sm text-gray-600">Due: {{ $rental->due_date->format('M d, Y') }}</p>
                                <button class="mt-3 w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">Read Now</button>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Recommended Books -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">New Arrivals</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($books as $book)
                        <div class="border rounded-lg overflow-hidden hover:shadow-lg transition">
                            <div class="h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">Cover Image</span>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg truncate">{{ $book->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $book->author->name }}</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-indigo-600 font-bold">${{ $book->price }}</span>
                                    <a href="{{ route('books.show', $book) }}" class="text-sm bg-gray-800 text-white px-3 py-1 rounded hover:bg-gray-700">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
