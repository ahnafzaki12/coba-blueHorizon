@extends('layouts.main')

@section('container')

    <body class="bg-gray-50">
        <div class="max-w-4xl mx-auto py-8 px-4">
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
                    class="alert alert-danger alert-dismissible fade show bg-red-100 text-red-800 p-4 rounded-lg shadow-md mb-3">
                    <span>{{ session('error') }}</span>
                    <button type="button" class="btn-close text-red-800 hover:text-red-600" data-bs-dismiss="alert"
                        aria-label="Close">
                        &times;
                    </button>
                </div>
            @endif

            <!-- Profile Header -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
                <div class="p-6 border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-dark">Profile Settings</h1>
                    <p class="text-gray-600 mt-1">Manage your account information and view your adoption history</p>
                </div>

                <!-- Profile Form -->
                <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" class="p-6">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-dark mb-2">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $name) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary
                    {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}">
                            @error('name')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div>
                            <label for="username" class="block text-sm font-medium text-dark mb-2">Username</label>
                            <input type="text" id="username" name="username" value="{{ old('username', $username) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary
                    {{ $errors->has('username') ? 'border-red-500' : 'border-gray-300' }}">
                            @error('username')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="md:col-span-2">
                            <label for="email" class="block text-sm font-medium text-dark mb-2">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $email) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary
                    {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}">
                            @error('email')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="mt-6 flex justify-end">
                        <button type="submit"
                            class="px-6 py-2 bg-primary hover:bg-secondary text-white font-medium rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            Update Profile
                        </button>
                    </div>
                </form>
            </div>


            <!-- Adoption Statistics -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-dark">My Adoptions</h2>
                    <p class="text-gray-600 mt-1">Your contribution to marine conservation</p>
                </div>

                <div class="p-6">
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <!-- Total Adoptions -->
                        <div class="text-center p-4 bg-light rounded-lg">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-heart text-white"></i>
                            </div>
                            <p class="text-2xl font-bold text-dark">{{ $total_adoptions }}</p>
                            <p class="text-sm text-gray-600">Total Adoptions</p>
                        </div>

                        <!-- Total Spent -->
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-dollar-sign text-white"></i>
                            </div>
                            <p class="text-2xl font-bold text-dark">${{ $total_contribution }}</p>
                            <p class="text-sm text-gray-600">Total Contribution</p>
                        </div>

                        <!-- Member Since -->
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="w-12 h-12 bg-accent rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-calendar text-white"></i>
                            </div>
                            <p class="text-2xl font-bold text-dark">{{ $member_since }}</p>
                            <p class="text-sm text-gray-600">Member Since</p>
                        </div>
                    </div>

                    <!-- Adoption History -->
                    <div>
                        <h3 class="text-lg font-semibold text-dark mb-4">Recent Adoptions</h3>
                        <div class="space-y-3">
                            <!-- Adoption Item -->
                            @foreach ($orders as $order)
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 bg-primary rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-fish text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-dark">{{ $order->product_name }}
                                                ({{ $order->quantity }})
                                            </p>
                                            <p class="text-sm text-gray-600">Adopted on {{ $order->created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-primary">${{ $order->unit_price * $order->quantity }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- View All Button -->
                        <div class="mt-4 text-center">
                            <button class="text-primary hover:text-secondary font-medium transition-colors">
                                View All Adoptions
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Account Security Section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-3 mt-6">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-dark">Account Security</h2>
                    <p class="text-gray-600 mt-1">Manage your account security and logout</p>
                </div>

                <div class="p-6">
                    <div class="flex items-center justify-between p-4 bg-red-50 border border-red-200 rounded-lg">
                        <div>
                            <h3 class="text-lg font-semibold text-red-800">Logout from Account</h3>
                            <p class="text-sm text-red-600 mt-1">This will end your current session and redirect you to the
                                homepage</p>
                        </div>
                        <form action="/logout" method="POST" class="ml-4">
                            @csrf
                            <button type="submit"
                                class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 flex items-center">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-sky-50 border border-sky-200 rounded-lg mt-3">
                        <div>
                            <h3 class="text-lg font-semibold text-sky-800">Change your Account Password</h3>
                            <p class="text-sm text-sky-600 mt-1">This will change your current password</p>
                        </div>
                        <form action="/change" method="get" class="ml-4">
                            @csrf
                            <button type="submit"
                                class="px-6 py-2 bg-sky-600 hover:bg-sky-700 text-white font-medium rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 flex items-center">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Change
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
