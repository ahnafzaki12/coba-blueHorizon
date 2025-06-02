<header id="navbar" class="bg-white shadow-sm sticky top-0 z-50 transition-all duration-300 ease-in-out">
    <div class="container mx-auto px-1 py-3 flex items-center justify-between">
        <div class="flex items-center left-0">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/BlueHorizon Logo 2.png') }}" alt="BlueHorizon Logo" class="h-16 mr-3">
            </a>
            <div class="ml-4">
                <img src="{{ asset('images/download.png') }}" alt="B Corp Certified" class="h-20">
            </div>
        </div>

        <nav class="hidden md:flex space-x-6">
            <a href="#coral-tools" class="text-gray-700 hover:text-primary font-medium">Coral Tools</a>
            <a href="#locations" class="text-gray-700 hover:text-primary font-medium">Locations</a>
            <a href="#tech" class="text-gray-700 hover:text-primary font-medium">Tech</a>
            <a href="#reefs-plus" class="text-gray-700 hover:text-primary font-medium">REEFS+</a>
            <a href="#academy" class="text-gray-700 hover:text-primary font-medium">Academy</a>
            <a href="#blog" class="text-gray-700 hover:text-primary font-medium">Blog</a>
            <a href="#about" class="text-gray-700 hover:text-primary font-medium">About</a>
            @can('admin')
                <a href="/dashboard" class="text-gray-700 hover:text-primary font-medium">Admiin</a>
            @endcan
        </nav>

        <div class="flex items-center space-x-4">
            <a href="/adopt" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-full font-medium">Adopt
                Coral</a>
            @auth
                <div class="flex items-center">
                    <a href="{{ route('profile.edit', Auth::user()->id) }}" class="flex items-center">
                        <!-- Profil Icon - Bulat dan minimalis -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="w-6 h-6 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 20.25a8.25 8.25 0 0115 0v.75H4.5v-.75z" />
                        </svg>
                    </a>
                </div>
            @else
                <a href="/login" class="text-gray-700 hover:text-primary font-medium">Sign In</a>
            @endauth

            <!-- select query -->
            <a href="{{ route('carts.index') }}" class="relative">
                <i class="fas fa-shopping-cart text-gray-700 text-xl"></i>
                <span
                    class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $cartCount }}</span>
            </a>
            <button id="mobile-menu-button" class="md:hidden text-gray-700">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
</header>
