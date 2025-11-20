<x-app-layout>
    <div class="space-y-8">
        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-dashboard.stat-card 
                title="Total Books" 
                value="{{ $stats['total_books'] }}" 
                color="indigo"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </x-slot:icon>
            </x-dashboard.stat-card>

            <x-dashboard.stat-card 
                title="Total Sales" 
                value="{{ $stats['total_sales'] }}" 
                color="green"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </x-slot:icon>
            </x-dashboard.stat-card>

            <x-dashboard.stat-card 
                title="Active Rentals" 
                value="{{ $stats['total_rentals'] }}" 
                color="blue"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </x-slot:icon>
            </x-dashboard.stat-card>
        </div>

        <!-- My Books -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <x-dashboard.section-header 
                title="My Published Works" 
                description="Manage your book collection, track sales, and rentals."
            >
                <x-slot:actions>
                    <a href="{{ route('books.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Upload New Book
                    </a>
                </x-slot:actions>
            </x-dashboard.section-header>
            
            @if($myBooks->isEmpty())
                <x-dashboard.empty-state 
                    title="No books found" 
                    description="You haven't uploaded any books yet. Get started by creating your first book."
                >
                    <x-slot:action>
                        <a href="{{ route('books.create') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                            Upload your first book
                        </a>
                    </x-slot:action>
                </x-dashboard.empty-state>
            @else
                <x-dashboard.data-table>
                    <x-slot:head>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rent Price</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </x-slot:head>
                    <x-slot:body>
                        @foreach($myBooks as $book)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $book->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-dashboard.status-badge 
                                        :status="ucfirst($book->status)" 
                                        :type="$book->status === 'approved' ? 'success' : ($book->status === 'rejected' ? 'error' : 'warning')" 
                                    />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ $book->price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ $book->rent_price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot:body>
                </x-dashboard.data-table>
            @endif
        </div>
    </div>
</x-app-layout>
