@extends('layouts.main')

@section('container')
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
    <!-- Page Header -->
    <section class="bg-primary py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold text-white mb-4">Adopt a Coral Reef</h1>
            <p class="text-xl text-white/90 max-w-3xl mx-auto">Make a direct impact on ocean conservation by adopting a coral
                reef today.</p>
        </div>
    </section>

    <!-- Adoption Options (Static Example) -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Choose Your Coral</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Each coral adoption directly supports restoration efforts and comes with regular updates on your coral's
                    growth.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Coral Option 1: Staghorn Coral -->
                <a href="#shopit">
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                        <div class="relative h-64">
                            <img src="images/Staghorn Coral.jpeg" alt="Staghorn Coral" class="w-full h-full object-cover">
                            <div
                                class="absolute top-4 right-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">
                                Most Popular</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Staghorn Coral</h3>
                            <p class="text-gray-600 mb-4">Fast-growing branching coral that provides essential habitat for
                                reef fish and invertebrates.</p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-2xl font-bold text-primary">$45</span>
                                <span class="text-sm text-gray-500">One-time adoption</span>
                            </div>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Digital adoption certificate</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Quarterly photo updates</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">GPS location tracking</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Impact reports</span></li>
                            </ul>
                            <button type="submit"
                                class="w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-lg font-medium"
                                name="add_to_cart">Adopt Now</button>
                        </div>
                    </div>
                </a>

                <!-- Coral Option 2: Brain Coral -->
                <a href="#shopit">
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                        <div class="relative h-64">
                            <img src="images/Brain Coral.jpeg" alt="Brain Coral" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Brain Coral</h3>
                            <p class="text-gray-600 mb-4">Slow-growing, long-lived coral that supports diverse marine life
                                and lasts centuries.</p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-2xl font-bold text-primary">$60</span>
                                <span class="text-sm text-gray-500">One-time adoption</span>
                            </div>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Digital adoption certificate</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Quarterly photo updates</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">GPS location tracking</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Impact reports</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Virtual diving experience</span></li>
                            </ul>
                            <button type="submit"
                                class="w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-lg font-medium"
                                name="add_to_cart">Adopt Now</button>
                        </div>
                    </div>
                </a>

                <!-- Coral Option 3: Coral Garden -->
                <a href="#shopit">
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                        <div class="relative h-64">
                            <img src="images/Coral Garden.jpeg" alt="Coral Garden" class="w-full h-full object-cover">
                            <div
                                class="absolute top-4 right-4 bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">
                                Best Value</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Coral Garden</h3>
                            <p class="text-gray-600 mb-4">Adopt a mini-ecosystem with multiple coral types and maximize
                                your
                                impact.</p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-2xl font-bold text-primary">$120</span>
                                <span class="text-sm text-gray-500">One-time adoption</span>
                            </div>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Digital adoption certificate</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Monthly photo updates</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">GPS location tracking</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Detailed impact reports</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Virtual diving experience</span></li>
                                <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-2"></i><span
                                        class="text-gray-600">Personalized video message</span></li>
                            </ul>
                            <button type="submit"
                                class="w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-lg font-medium"
                                name="add_to_cart">Adopt Now</button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- ShopIT --}}
    <section id="shopit">
        <div class="bg-gray-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <section class="max-w-7xl mx-auto">
                <h2 class="text-3xl text-center font-bold text-gray-800 mb-3">Let's Adopt</h2>
                <p class="text-xl text-center mb-12 text-gray-600 max-w-3xl mx-auto">
                    Every adoption helps restore our oceans and brings hope to marine life.
                    You'll receive regular updates on your coral’s progress, so you can watch your impact grow beneath the
                    waves.
                </p>

                <div class="grid text-center grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @if ($products->isEmpty())
                        <div class="flex justify-center">
                            <div
                                class="container bg-primary text-center font-medium text-white uppercase tracking-wider mx-auto px-6 py-16 max-w-6xl rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                                <span class="text-lg font-semibold">No Products Available</span>
                                <div class="mt-4 text-sm opacity-75">It seems like we don't have any products at the
                                    moment. Please check back later!</div>
                            </div>
                        </div>
                    @else
                        @foreach ($products as $product)
                            <form action="{{ route('carts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform duration-300 hover:shadow-lg hover:-translate-y-1"
                                    id="{{ $product->name }}">
                                    <div class="relative h-64 overflow-hidden">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-semibold text-dark mb-2">{{ $product->name }}</h3>
                                        <div class="text-primary font-medium mb-4">
                                            Price: ${{ $product->price }}
                                        </div>
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="hidden" name="image" value="{{ $product->image }}">
                                        <button type="submit" name="add_to_cart"
                                            class="w-full bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-md transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    @endif
                </div>


            </section>
        </div>
    </section>


    <!-- How It Works -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">How Coral Adoption Works</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Your adoption journey from selection to tracking your
                    coral's growth.</p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4 text-white text-xl font-bold">
                        1</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Choose Your Coral</h3>
                    <p class="text-gray-600">Select from different coral species based on your preferences and budget.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4 text-white text-xl font-bold">
                        2</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Complete Adoption</h3>
                    <p class="text-gray-600">Personalize your coral with a name and complete your adoption process.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4 text-white text-xl font-bold">
                        3</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Receive Updates</h3>
                    <p class="text-gray-600">Get regular photo updates and reports on your coral's growth and health.</p>
                </div>

                <!-- Step 4 -->
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4 text-white text-xl font-bold">
                        4</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Track Impact</h3>
                    <p class="text-gray-600">Monitor the environmental impact of your contribution through our dashboard.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gift Options -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Gift a Coral</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Share the joy of conservation with friends and family by
                    gifting a coral adoption.</p>
            </div>

            <div class="bg-light rounded-xl p-8 shadow-sm">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">The Perfect Meaningful Gift</h3>
                        <p class="text-gray-600 mb-6">A coral adoption gift is perfect for birthdays, holidays, or any
                            special occasion. The recipient will receive:</p>

                        <ul class="space-y-3 mb-6">
                            <li class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-6 h-6 bg-primary rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-gift text-white text-xs"></i>
                                </div>
                                <p class="ml-3 text-gray-600">Personalized digital gift certificate</p>
                            </li>
                            <li class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-6 h-6 bg-primary rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-camera text-white text-xs"></i>
                                </div>
                                <p class="ml-3 text-gray-600">Regular photo updates of their coral</p>
                            </li>
                            <li class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-6 h-6 bg-primary rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-map-marker-alt text-white text-xs"></i>
                                </div>
                                <p class="ml-3 text-gray-600">GPS location of their adopted coral</p>
                            </li>
                            <li class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-6 h-6 bg-primary rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-chart-line text-white text-xs"></i>
                                </div>
                                <p class="ml-3 text-gray-600">Impact reports showing their contribution</p>
                            </li>
                        </ul>

                        <a href="gift.php"
                            class="inline-block bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-full font-medium">Gift
                            a Coral</a>
                    </div>

                    <div class="rounded-lg shadow-md overflow-hidden">
                        <img src="images/ChatGPT Image May 1, 2025, 04_53_51 PM.png" alt="Gift Certificate"
                            class="w-full h-auto object-contain">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Learn more about our coral adoption program.</p>
            </div>

            <div class="max-w-3xl mx-auto space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <h3 class="text-lg font-medium text-gray-800">How does coral adoption work?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">When you adopt a coral, our team plants and nurtures a coral fragment in
                            your name. You'll receive regular updates with photos and data about your coral's growth and the
                            surrounding ecosystem. Your adoption directly funds our conservation efforts and supports local
                            communities involved in reef restoration.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <h3 class="text-lg font-medium text-gray-800">Where are your coral restoration sites located?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">We currently have active restoration sites in Indonesia, the Philippines,
                            and Malaysia. Each site is carefully selected based on ecological importance, restoration
                            potential, and community engagement opportunities. We're continuously expanding to new locations
                            to increase our impact.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <h3 class="text-lg font-medium text-gray-800">How often will I receive updates about my coral?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">Update frequency depends on your adoption package. Standard adoptions
                            receive quarterly updates, while premium packages receive monthly updates. Each update includes
                            recent photos, growth measurements, and information about the surrounding ecosystem's health.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <h3 class="text-lg font-medium text-gray-800">Can I visit my adopted coral?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">Yes! We offer special diving experiences for coral adopters at our
                            restoration sites. These visits must be arranged in advance and are subject to weather
                            conditions and site accessibility. Contact our team for more information about visiting
                            opportunities.</p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <h3 class="text-lg font-medium text-gray-800">What happens if my coral doesn't survive?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">While our survival rates are high (over 85%), natural events can sometimes
                            affect coral health. If your adopted coral doesn't survive within the first year, we'll replace
                            it at no additional cost and continue to provide updates on the new coral.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endsection
