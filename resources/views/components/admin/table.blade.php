@props(['headers' => [], 'emptyMessage' => 'No data available'])

<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
    <table class="min-w-full divide-y divide-gray-300">
        @if(!empty($headers))
        <thead class="bg-gray-50">
            <tr>
                @foreach($headers as $header)
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{ $header }}
                </th>
                @endforeach
            </tr>
        </thead>
        @endif
        <tbody class="divide-y divide-gray-200 bg-white">
            @if(isset($slot) && trim($slot) !== '')
                {{ $slot }}
            @else
            <tr>
                <td colspan="{{ count($headers) }}" class="px-6 py-4 text-center text-sm text-gray-500">
                    {{ $emptyMessage }}
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
