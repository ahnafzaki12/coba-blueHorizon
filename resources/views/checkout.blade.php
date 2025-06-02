@extends('layouts.main')

@section('container')
    <!-- resources/views/checkout.blade.php -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        @if (session('success'))
            <div
                class="flex flex-col bg-light text-dark p-6 rounded-lg shadow-sm border border-accent max-w-md mx-auto absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-1/2 z-50">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                        </svg>
                        <h3 class="text-lg font-semibold">{{ session('success') }}</h3>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-gray-50 min-h-screen py-12 px-4">
            <div class="max-w-3xl mx-auto">
                <section class="mb-8">
                    <h1 class="text-3xl font-bold text-dark mb-8 text-center">Finalize your order</h1>

                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-6 overflow-hidden">
                            <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-medium text-dark">Billing details</h2>
                            </div>

                            <div class="p-6 space-y-4">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Your name <sup class="text-red-500">*</sup>
                                    </label>
                                    <input type="text" name="name" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Company name (optional)
                                    </label>
                                    <input type="text" name="company"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Email address <sup class="text-red-500">*</sup>
                                    </label>
                                    <input type="email" name="email" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Country / Region <sup class="text-red-500">*</sup>
                                    </label>
                                    <select name="country" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Norwegia">Norwegia</option>
                                        <option value="Canada">Canada</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-6 overflow-hidden">
                            <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-medium text-dark">Order summary</h2>
                            </div>

                            <div class="p-6">
                                @forelse ($carts as $cart_item)
                                    <?php $total_price = $cart_item->price * $cart_item->quantity; ?>
                                    <div class="flex justify-between py-2 border-b border-gray-100">
                                        <span class="text-gray-700">{{ $cart_item->name }}
                                            ({{ $cart_item->quantity }})</span>
                                        <span class="font-medium">${{ $total_price }}</span>
                                    </div>
                                @empty
                                    <div class="bg-primary text-center font-medium text-white py-3 rounded-md">Cart is empty
                                    </div>
                                @endforelse

                                <!-- Total -->
                                <div class="flex justify-between items-center py-4">
                                    <span class="font-medium text-gray-700">Total</span>
                                    <span class="text-xl font-bold text-dark">${{ $grand_total }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="mb-6 flex items-start">
                            <input type="checkbox" id="terms" name="terms" required class="mt-1 mr-2">
                            <label for="terms" class="text-sm text-gray-700">
                                I have read and agree to the website
                                <a href="#" class="text-primary hover:text-secondary">terms and conditions</a>
                            </label>
                        </div>


                        <button type="submit"
                            class="w-full bg-primary hover:bg-secondary text-white font-medium py-3 px-4 rounded-md transition-colors">
                            Place Order
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </body>

    </html>
@endsection
