@extends('layouts.app')

@section('title', 'Manage Account')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Account</h1>
    <button
        class="flex items-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
        onclick="create_user_modal.showModal()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah
    </button>
</div>

<div class="bg-white shadow rounded-lg overflow-x-auto">
    <table class="min-w-full table-auto text-sm">
        <thead class="bg-teal-100 text-black font-semibold">
            <tr>
                <th class="text-left px-4 py-2">Nama</th>
                <th class="text-left px-4 py-2">Email</th>
                <th class="text-left px-4 py-2">Phone</th>
                <th class="text-left px-4 py-2">Role</th>
                <th class="text-center px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2 font-medium text-gray-900">{{ $user->name }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $user->email }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $user->phone ?? '-' }}</td>
                    <td class="px-4 py-2">
                        <span class="inline-block px-2 py-1 rounded text-white text-xs
                            {{ $user->role === 'admin' ? 'bg-red-500' : ($user->role === 'operator' ? 'bg-yellow-500' : 'bg-green-500') }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                <td class="text-center whitespace-nowrap">
                    <button class="btn btn-xs btn-outline btn-info mr-1"
                        onclick="edit_user_modal_{{$user->id}}.showModal()">
                        Edit
                    </button>
                    @if (Auth::id()!== $user->id)
                    <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button  type="submit" class="btn btn-xs btn-outline btn-error delete-button">DELETE</button>
                    </form>
                    @endif
                </td>
            </tr>
            @include('admin.users.edit', ['user' => $user])
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">
                        Tidak ada data akun yang ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    @if ($users->hasPages())
    {{$users->links()}}
    @endif
</div>
@include('admin.users.create')
@endsection
