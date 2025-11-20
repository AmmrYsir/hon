<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg border border-gray-200">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    {{ $head }}
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                {{ $body }}
            </tbody>
        </table>
    </div>
    @if(isset($pagination))
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $pagination }}
        </div>
    @endif
</div>
