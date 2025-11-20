<x-app-layout>
    <div class="space-y-6">
        <!-- User Management -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <x-dashboard.section-header 
                title="User Management" 
                description="Manage system users, assign roles, and track activity."
            >
                <x-slot:actions>
                    <button class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Staff
                    </button>
                </x-slot:actions>
            </x-dashboard.section-header>
            
            <x-dashboard.data-table>
                <x-slot:head>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </x-slot:head>
                <x-slot:body>
                    @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <span class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-500 font-bold text-sm">
                                            {{ substr($user->name, 0, 2) }}
                                        </span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @foreach($user->roles as $role)
                                    <x-dashboard.status-badge 
                                        :status="ucfirst($role->name)" 
                                        :type="$role->name === 'admin' ? 'error' : ($role->name === 'author' ? 'warning' : 'info')" 
                                    />
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:body>
                <x-slot:pagination>
                    {{ $users->links() }}
                </x-slot:pagination>
            </x-dashboard.data-table>
        </div>
    </div>
</x-app-layout>
