@extends('layouts.main')

@section('container')
    <!-- Login Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-sm p-8">
                @if (session()->has('success'))
                    <div
                        class="alert alert-success alert-dismissible fade show bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-3">
                        <span>{{ session('success') }}</span>
                        <button type="button" class="btn-close text-green-800 hover:text-green-600" data-bs-dismiss="alert"
                            aria-label="Close">
                            &times;
                        </button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div
                        class="alert alert-success alert-dismissible fade show bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-3">
                        <span>{{ session('error') }}</span>
                        <button type="button" class="btn-close text-green-800 hover:text-green-600" data-bs-dismiss="alert"
                            aria-label="Close">
                            &times;
                        </button>
                    </div>
                @endif
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        <div class="bg-red-500 text-white p-4 rounded-lg flex justify-between items-center">
                            <span>{{ session('loginError') }}</span>
                            <button type="button" class="text-white" data-bs-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Welcome Back</h1>
                    <p class="text-gray-600">Sign in to access your coral dashboard</p>
                </div>

                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="text" id="email" name="email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary
            {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}"
                            required value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary
            {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}"
                            required>
                        @error('password')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                        <div class="flex justify-end mt-1">
                            <a href="forgot-password.php" class="text-sm text-primary hover:underline">Forgot password?</a>
                        </div>
                    </div>

                    <button type="submit" name="login"
                        class="w-full bg-primary hover:bg-primary/90 text-white py-2 rounded-lg font-medium">Sign
                        In</button>
                </form>


                <div class="mt-6 text-center">
                    <p class="text-gray-600">Don't have an account? <a href="/register"
                            class="text-primary hover:underline">Sign up</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
