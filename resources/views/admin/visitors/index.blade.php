@extends('admin.layouts.app')

@section('title', 'Visitors')

@section('content')
<div class="px-6 py-4">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Visitors</h1>
    </div>

    @empty($visitors)
    <div class="bg-white p-6 text-center">
        <p class="text-gray-500">No visitors found.</p>
    </div>
    @else
    <div class="bg-white overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP Address</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Browser</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Platform</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Device</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Is Robot</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Page Visited</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($visitors as $visitor)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $visitor->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $visitor->ip_address }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $visitor->browser }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $visitor->platform }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $visitor->device }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $visitor->is_robot }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $visitor->page_visited }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $visitor->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $visitors->links() }}
        </div>
    </div>
    @endempty
</div>
@endsection
