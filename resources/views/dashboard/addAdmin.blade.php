@extends('dashboard.layouts.main')

@section('container')
    <div class="container mx-auto px-4 py-8 max-w-7xl z-0">
        <div class="flex flex-col-reverse lg:flex-row bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Form Section -->
            <div class="w-full lg:w-1/2 p-8 lg:p-12">
                <form action="/dashboard/storeAdmin" method="post" enctype="multipart/form-data">
                    @csrf
                    <h2 class="font-bold text-3xl mb-8 text-gray-800">Create Admin</h2>
                    <div class="space-y-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block font-medium text-gray-700 text-sm mb-2">Name</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-transparent transition-colors
                {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}"
                                required value="{{ old('name') }}">
                            @error('name')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div>
                            <label for="username" class="block font-medium text-gray-700 text-sm mb-2">Username</label>
                            <input type="text" id="username" name="username"
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-transparent transition-colors
                {{ $errors->has('username') ? 'border-red-500' : 'border-gray-300' }}"
                                required value="{{ old('username') }}">
                            @error('username')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block font-medium text-gray-700 text-sm mb-2">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-transparent transition-colors
                {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}"
                                required value="{{ old('email') }}">
                            @error('email')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                         <input type="hidden" name="is_admin" value="1">

                        <!-- Password -->
                        <div>
                            <label for="password" class="block font-medium text-gray-700 text-sm mb-2">Password</label>
                            <input type="password" name="password" id="password"
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-transparent transition-colors
                {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}"
                                required>
                            @error('password')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                            <p class="mt-2 text-xs text-gray-500">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-sky-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                    </svg>
                                    Create a strong password with a minimum of 10 characters and a mix of letters, numbers,
                                    and symbols.
                                </span>
                            </p>
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" name="register"
                            class="w-full mt-8 px-6 py-3 bg-sky-500 hover:bg-sky-600 text-white font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Create Admin
                        </button>
                    </div>
                </form>
            </div>

            <!-- Image Section - Improved -->
            <div class="w-full lg:w-1/2 relative">
                <!-- Main Image -->
                <div class="absolute inset-0 bg-gradient-to-r from-sky-400/90 to-sky-600/90 mix-blend-multiply"></div>
                <img src="{{ asset('images/Download premium image of Tropical sea underwater landscape outdoors_ about cloud, palm tree, scenery, plant, and sky 13922459 (1).jpg') }}"
                    alt="Tropical Sea" class="w-full h-full object-cover object-center">

                <!-- Content Overlay -->
                <div class="absolute inset-0 flex flex-col justify-center items-center p-12 text-white">
                    <div class="max-w-md text-center">
                        <h2 class="text-3xl font-bold mb-4">Join BlueHorizon as an Admin</h2>
                        <p class="text-lg mb-6">Become part of our mission to restore and protect the oceans while managing
                            impactful projects.</p>

                        <!-- Feature Points -->
                        <div class="space-y-3 text-left">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-sky-300" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Oversee Marine Conservation Initiatives</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-sky-300" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Access Advanced Analytics and Reports</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-sky-300" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Lead Community Engagement</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
