@extends('layouts.app')

@section('title', 'Manage Account')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Account</h1>
    <button
        class="flex items-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition cursor-pointer"
        onclick="create_user_modal.showModal()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah
    </button>
</div>

    @if (session('success'))
        <div id="alert-success" role="alert" class="alert alert-success mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div id="alert-error" role="alert" class="alert alert-error mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div id="alert-validation" role="alert" class="alert alert-warning mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            <span> Gagal menambahkan user. Silakan klik 'Tambah User' lagi dan periksa error pada form.</span>
        </div>
    @endif

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
