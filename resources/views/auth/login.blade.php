@extends('layouts.guest')
@section('title', 'Halaman Login')
@section('content')
<div class="flex items-center justify-center min-h-screen px-4 py-12 bg-white sm:px-6 lg:px-8 font-inter">
    <div class="w-full max-w-5xl mx-auto">
        <div class="flex overflow-hidden rounded-xl shadow-xl border border-gray-200">
            <div class="w-full md:w-1/2 p-8 sm:p-10 lg:p-12">
                <div class="w-full max-w-md mx-auto">
                    <div class="mb-8 text-left">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">
                            Sign-in
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Sign-in to BorrowBox now
                        </p>
                    </div>

                    <form class="space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="login_identifier" class="block text-xs font-medium text-gray-500 mb-1">
                                Email atau Username
                            </label>
                            <input id="login_identifier" name="login_identifier" type="text" autocomplete="username email" required
                                   value="{{ old('login_identifier') }}"
                                   class="block w-full px-4 py-3 text-gray-900 border border-gray-300 rounded-md appearance-none placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"
                                   placeholder="Masukkan email atau username">
                            @error('login_identifier')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-xs font-medium text-gray-500 mb-1">
                                Password
                            </label>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                   class="block w-full px-4 py-3 text-gray-900 border border-gray-300 rounded-md appearance-none placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"
                                   placeholder="••••••••">
                            @error('password')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit"
                                    class="flex w-full justify-center rounded-md border border-transparent bg-teal-300 py-3 px-4 text-sm font-semibold text-white shadow-sm hover:bg-teal-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition duration-150 ease-in-out cursor-pointer">
                                Login
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 text-sm text-center">
                        <span class="text-gray-700">Forgot password? </span>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="font-semibold text-cyan-400 hover:text-cyan-500">
                                Reset Password
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="hidden md:flex md:w-1/2 bg-white border-l border-gray-200 items-center justify-center p-8 lg:p-10">
                <div class="w-full max-w-md flex flex-col items-center justify-center bg-white border-2 border-cyan-200 rounded-xl p-6 shadow-md">
                    <div class="text-center">
                        <img src="{{ asset('img/logo-borrowbox.svg') }}" alt="BorrowBox Logo" class="w-16 h-16 mx-auto mb-4">
                        <img src="{{ asset('img/prototype.png') }}" alt="BorrowBox Prototype"
                             class="rounded-lg w-full max-w-xs sm:max-w-sm mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
