<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6">Upload New Book</h2>

        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label for="type" class="block text-gray-700 font-bold mb-2">Type</label>
                <select name="type" id="type" class="w-full border rounded px-3 py-2">
                    <option value="read_online">Read Online Only</option>
                    <option value="sell">Sell</option>
                    <option value="rent">Rent</option>
                </select>
            </div>

            <!-- Prices -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="price" class="block text-gray-700 font-bold mb-2">Selling Price ($)</label>
                    <input type="number" step="0.01" name="price" id="price" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label for="rent_price" class="block text-gray-700 font-bold mb-2">Rental Price ($)</label>
                    <input type="number" step="0.01" name="rent_price" id="rent_price" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Submit Book</button>
            </div>
        </form>
    </div>
</x-app-layout>
