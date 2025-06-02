<!-- Header -->
<header class="bg-white shadow-lg border-b border-gray-200 sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="/dashboard" class="flex items-center group">
                    <img src="{{ asset('images/BlueHorizon Logo 2.png') }}" alt="BlueHorizon Logo"
                        class="h-12 mr-3 transition-transform duration-200 group-hover:scale-105">
                </a>
                <div class="ml-6 hidden lg:block">
                    <img src="{{ asset('images/download.png') }}" alt="B Corp Certified" class="h-16 opacity-80">
                </div>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-1">
                <!-- Products Dropdown -->
                <div class="relative group">
                    <button
                        class="flex items-center px-4 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg font-medium transition-all duration-200">
                        <i class="fas fa-box mr-2"></i>
                        Products
                        <i
                            class="fas fa-chevron-down ml-2 text-xs group-hover:rotate-180 transition-transform duration-200"></i>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-1 group-hover:translate-y-0">
                        <div class="py-2">
                            <a href="{{ route('products.create') }}"
                                class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors">
                                <i class="fas fa-plus mr-3 text-sm"></i>
                                Add Product
                            </a>
                            <a href="{{ route('products.index') }}"
                                class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors">
                                <i class="fas fa-list mr-3 text-sm"></i>
                                View Products
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Link -->
                <a href="/dashboard"
                    class="flex items-center px-4 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg font-medium transition-all duration-200">
                    <i class="fas fa-chart-bar mr-2"></i>
                    Dashboard
                </a>

                <!-- Orders Link -->
                <a href="/dashboard/orders"
                    class="flex items-center px-4 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg font-medium transition-all duration-200">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    Orders
                </a>

                <!-- Profile Dropdown -->
                <div class="relative group ml-4 dropdown">
                    <button
                        class="flex items-center px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-all duration-200">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-2">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <span class="font-medium">Admin</span>
                        <i
                            class="fas fa-chevron-down ml-2 text-xs group-hover:rotate-180 transition-transform duration-200"></i>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-1 group-hover:translate-y-0 z-50">
                        <div class="py-2">
                            <a href="/"
                                class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors">
                                <i class="fas fa-home mr-3 text-sm"></i>
                                Home
                            </a>
                            <hr class="my-2 border-gray-200">
                            <a href="/dashboard/addAdmin"
                                class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors">
                                <i class="fas fa-user-cog mr-3 text-sm"></i>
                                Add Admin
                            </a>
                            <hr class="my-2 border-gray-200">
                            <form action="logout" method="POST">
                                @csrf
                                <button
                                    class="flex items-center px-4 py-2 text-red-600 hover:text-sky-500 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3 text-sm"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn"
                    class="md:hidden flex items-center px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-bars text-lg"></i>
                </button>
        </div>
