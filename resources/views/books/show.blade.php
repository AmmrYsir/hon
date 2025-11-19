<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow overflow-hidden">
        <div class="md:flex">
            <!-- Cover Image Placeholder -->
            <div class="md:w-1/3 bg-gray-200 h-96 flex items-center justify-center">
                <span class="text-gray-500 text-xl">Cover Image</span>
            </div>

            <!-- Details -->
            <div class="p-8 md:w-2/3">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $book->title }}</h1>
                <p class="text-gray-600 mb-4">By {{ $book->author->name }}</p>
                
                <div class="mb-6">
                    <span class="inline-block bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm font-semibold">
                        {{ ucfirst(str_replace('_', ' ', $book->type)) }}
                    </span>
                </div>

                <p class="text-gray-700 mb-6 leading-relaxed">
                    {{ $book->description ?? 'No description available.' }}
                </p>

                <div class="flex items-center space-x-4 border-t pt-6">
                    @if($book->type === 'sell' || $book->type === 'read_online')
                        <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 font-bold">
                            Buy for ${{ $book->price ?? '0.00' }}
                        </button>
                    @endif

                    @if($book->type === 'rent')
                        <button class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 font-bold">
                            Rent for ${{ $book->rent_price ?? '0.00' }}
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
