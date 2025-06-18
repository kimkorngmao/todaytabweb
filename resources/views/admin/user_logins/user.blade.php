@extends('admin.layouts.app')

@section('title', 'Login History for ' . ($user->username ?? $user->email))

@section('content')
<div class="px-6 py-4">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Login History for {{ $user->username ?? $user->email }}</h1>
    </div>
    <div class="mb-4">
        <span class="font-semibold">Name:</span> {{ $user->first_name }} {{ $user->last_name }}<br>
        <span class="font-semibold">Email:</span> {{ $user->email }}
    </div>

    @empty($logins)
    <div class="bg-white p-6 text-center">
        <p class="text-gray-500">No login history found for this user.</p>
    </div>
    @else
    <div class="bg-white overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP Address</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Agent</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Login Time</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($logins as $login)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $login->ip_address }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">{{ $login->user_agent }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $login->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $logins->links() }}
        </div>
    </div>
    @endempty
    <div class="mt-4">
        <a href="{{ route('admin.logins.index') }}" class="text-blue-600 hover:underline">&larr; Back to all logins</a>
    </div>
</div>
@endsection
