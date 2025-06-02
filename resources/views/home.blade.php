@extends('layouts.main')


@section('container')
    <!-- Hero Section -->
    <section class="relative h-[600px] overflow-hidden mb-3">
        <div class="absolute inset-0 bg-gradient-to-r from-dark/70 to-transparent z-10"></div>
        <img src="images/Download premium image of Tropical sea underwater landscape outdoors_ about cloud, palm tree, scenery, plant, and sky 13922459 (1).jpg"
            alt="Coral Reef" class="absolute inset-0 w-full h-full object-cover">

        <div class="relative z-20 container mx-auto px-4 h-full flex items-center">
            <div class="max-w-2xl text-white">
                <h1 class="text-5xl font-bold mb-4 text-white">
                    Integrate transparent
                    <span class="animated-gradient font-extrabold">coral reef</span>
                    conservation into your business
                </h1>
                <p class="text-xl mb-8">Innovative and easy ways to become sustainable and protect our oceans</p>
                <div class="flex flex-wrap gap-4">
                    <a href="get-started.php"
                        class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-full font-medium text-lg">Get
                        started</a>
                    <a href="#learn-more"
                        class="bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white px-6 py-3 rounded-full font-medium text-lg">Learn
                        more</a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-white to-transparent z-10"></div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">How BlueHorizon Works</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Join our mission to restore and protect coral reefs
                    through transparent, technology-driven conservation efforts.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-light rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-hand-holding-heart text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Adopt a Coral Reef</h3>
                    <p class="text-gray-600">Choose a coral reef to adopt and support its restoration. Each coral has a
                        unique identity and story.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-light rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-chart-line text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Track Growth & Impact</h3>
                    <p class="text-gray-600">Monitor your coral's growth with regular updates and see the real impact of
                        your contribution.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-light rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-gift text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Gift a Coral</h3>
                    <p class="text-gray-600">Share the joy of conservation by gifting a coral to friends, family, or
                        colleagues.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Preview Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Real-time Monitoring Dashboard</h2>
                    <p class="text-lg text-gray-600 mb-6">Our innovative dashboard provides transparent tracking of your
                        coral reef's health and growth. Monitor environmental parameters and see the impact of your
                        contribution.</p>

                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 w-6 h-6 bg-primary rounded-full flex items-center justify-center mt-1">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <p class="ml-3 text-gray-600">Track dissolved oxygen levels and water temperature</p>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 w-6 h-6 bg-primary rounded-full flex items-center justify-center mt-1">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <p class="ml-3 text-gray-600">View regular photo updates of your coral reef</p>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 w-6 h-6 bg-primary rounded-full flex items-center justify-center mt-1">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <p class="ml-3 text-gray-600">Access detailed reports on conservation progress</p>
                        </li>
                    </ul>

                    <a href="dashboard-demo.php"
                        class="inline-block mt-8 bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-full font-medium">View
                        Demo Dashboard</a>
                </div>

                <div class="md:w-1/2">
                    <img src="images/dahsboard_monitor.png" alt="BlueHorizon Dashboard" class="rounded-xl shadow-lg w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- CSR Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Corporate Sustainability Solutions</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Integrate coral reef conservation into your CSR strategy
                    with transparent, measurable impact.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- CSR Feature 1 -->
                <div class="bg-light rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Branded Conservation Areas</h3>
                    <p class="text-gray-600 mb-6">Adopt an entire conservation area with your company branding. Perfect for
                        showcasing your commitment to ocean conservation.</p>
                    <a href="corporate.php" class="text-primary font-medium hover:underline">Learn more <i
                            class="fas fa-arrow-right ml-1"></i></a>
                </div>

                <!-- CSR Feature 2 -->
                <div class="bg-light rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Employee Engagement Programs</h3>
                    <p class="text-gray-600 mb-6">Involve your employees in conservation efforts with team coral adoption
                        programs and virtual diving experiences.</p>
                    <a href="corporate.php" class="text-primary font-medium hover:underline">Learn more <i
                            class="fas fa-arrow-right ml-1"></i></a>
                </div>

                <!-- CSR Feature 3 -->
                <div class="bg-light rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Impact Reporting</h3>
                    <p class="text-gray-600 mb-6">Receive detailed reports on your conservation impact, perfect for
                        sustainability reporting and stakeholder communication.</p>
                    <a href="corporate.php" class="text-primary font-medium hover:underline">Learn more <i
                            class="fas fa-arrow-right ml-1"></i></a>
                </div>

                <!-- CSR Feature 4 -->
                <div class="bg-light rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Customer Engagement</h3>
                    <p class="text-gray-600 mb-6">Engage your customers in your sustainability journey with co-branded coral
                        adoption certificates and tracking.</p>
                    <a href="corporate.php" class="text-primary font-medium hover:underline">Learn more <i
                            class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="contact.php"
                    class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-full font-medium">Contact our CSR
                    team</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">What Our Partners Say</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Join hundreds of individuals and organizations making a
                    difference for our oceans.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center mb-4">
                        <img src="images/testimonial-1.jpg" alt="Testimonial"
                            class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Sarah Johnson</h4>
                            <p class="text-gray-600 text-sm">Sustainability Director, EcoTech Inc.</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"BlueHorizon has transformed how we approach marine conservation in our CSR
                        strategy. The transparency and regular updates keep our team engaged and proud of our impact."</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center mb-4">
                        <img src="images/testimonial-2.jpg" alt="Testimonial"
                            class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Michael Chen</h4>
                            <p class="text-gray-600 text-sm">Individual Supporter</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"I gifted a coral to my daughter for her birthday, and she loves checking on
                        its growth. It's a meaningful way to teach the next generation about conservation."</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center mb-4">
                        <img src="images/testimonial-3.jpg" alt="Testimonial"
                            class="w-12 h-12 rounded-full object-cover">
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Elena Rodriguez</h4>
                            <p class="text-gray-600 text-sm">CEO, Blue Wave Resorts</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"As a coastal resort, healthy coral reefs are essential to our business.
                        BlueHorizon helps us protect our local marine ecosystem while engaging our guests in conservation."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-primary">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">Ready to make a difference for our oceans?</h2>
            <p class="text-xl text-white/90 max-w-3xl mx-auto mb-8">Join our global community of coral conservationists and
                help restore the beauty of our underwater world.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="adopt.html"
                    class="bg-white text-primary hover:bg-gray-100 px-6 py-3 rounded-full font-medium text-lg">Adopt a
                    Coral Reef</a>
                <a href="corporate.php"
                    class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-full font-medium text-lg">Corporate
                    Solutions</a>
            </div>
        </div>
    </section>
@endsection

<style>
  .animated-gradient {
    background: linear-gradient(270deg, #0ea5e9, #0284c7, #06b6d4, #0ea5e9); /* biru muda, biru, toska */
    background-size: 600% 600%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: gradientMove 8s ease infinite;
  }

  @keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }
</style>
