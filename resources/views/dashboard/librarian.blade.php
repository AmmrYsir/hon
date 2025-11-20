<x-app-layout>
    <div class="space-y-8">
        <!-- Pending Approvals -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <x-dashboard.section-header 
                title="Pending Approvals" 
                description="Review and approve books submitted by authors."
            />
            
            @if($pendingBooks->isEmpty())
                <x-dashboard.empty-state 
                    title="No pending approvals" 
                    description="There are no books waiting for approval at this time."
                />
            @else
                <x-dashboard.data-table>
                    <x-slot:head>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </x-slot:head>
                    <x-slot:body>
                        @foreach($pendingBooks as $book)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $book->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $book->author->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $book->created_at->diffForHumans() }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-green-600 hover:text-green-900 mr-3 font-semibold">Approve</button>
                                    <button class="text-red-600 hover:text-red-900 font-semibold">Reject</button>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot:body>
                </x-dashboard.data-table>
            @endif
        </div>

        <!-- All Books -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <x-dashboard.section-header 
                title="Library Catalog" 
                description="View and manage all books in the library system."
            />

            <x-dashboard.data-table>
                <x-slot:head>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </x-slot:head>
                <x-slot:body>
                    @foreach($allBooks as $book)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $book->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $book->author->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-dashboard.status-badge 
                                    :status="ucfirst($book->status)" 
                                    :type="$book->status === 'approved' ? 'success' : ($book->status === 'rejected' ? 'error' : 'warning')" 
                                />
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:body>
                <x-slot:pagination>
                    {{ $allBooks->links() }}
                </x-slot:pagination>
            </x-dashboard.data-table>
        </div>
    </div>
</x-app-layout>
