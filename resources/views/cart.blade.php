@extends('layouts.main')

@section('container')

    <div class="bg-white min-h-screen">
        <section class="max-w-6xl mx-auto px-4 py-12">
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
            <h1 class="text-4xl font-bold text-dark mb-8 text-center">My Cart</h1>

            <!-- Cart Table -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                <div class="overflow-x-auto">
                    @if ($carts->count() > 0)
                        <table class="w-full mb-8 border-collapse">
                            <thead>
                                <tr class="bg-light border-b border-gray-200">
                                    <th class="py-4 px-6 text-left font-medium text-dark">#</th>
                                    <th class="py-4 px-6 text-left font-medium text-dark">Product Name</th>
                                    <th class="py-4 px-6 text-left font-medium text-dark">Product Image</th>
                                    <th class="py-4 px-6 text-left font-medium text-dark">Product Price</th>
                                    <th class="py-4 px-6 text-left font-medium text-dark">Product Quantity</th>
                                    <th class="py-4 px-6 text-left font-medium text-dark">Total Price</th>
                                    <th class="py-4 px-6 text-left font-medium text-dark">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $index => $item)
                                    <tr class="border-b border-gray-100 hover:bg-light">
                                        <td class="py-4 px-6">{{ $index + 1 }}</td>
                                        <td class="py-4 px-6">{{ $item->name }}</td>
                                        <td class="py-4 px-6">
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                                class="w-20 h-20 object-cover rounded">
                                        </td>
                                        <td class="py-4 px-6 text-dark">${{ number_format($item->price, 2) }}</td>
                                        <td class="py-4 px-6">
                                            <form action="{{ route('carts.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="flex items-center space-x-2">
                                                    <input type="number" min="1" value="{{ $item->quantity }}"
                                                        name="quantity"
                                                        class="w-16 px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-primary">
                                                    <button type="submit"
                                                        class="bg-primary hover:bg-secondary text-white px-3 py-1 rounded text-sm cursor-pointer transition-colors">
                                                        Update
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="py-4 px-6 font-medium text-dark">
                                            ${{ number_format($item->price * $item->quantity, 2) }}
                                        </td>
                                        <td class="py-4 px-6">
                                            <form action="{{ route('carts.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')"
                                                    class="text-red-500 hover:text-red-700 transition-colors">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center py-8 text-lg font-semibold text-gray-600">Your cart is empty.</div>
                    @endif
                </div>
            </div>


            @if ($cartCount > 0)
                <!-- Bottom Area -->
                <div class="flex justify-between items-center border-t border-gray-200 pt-6 pb-4">
                    <!-- Left: Continue Adopt -->
                    <div>
                        <a href="/adopt" class="text-primary hover:text-secondary transition-colors font-medium">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Continue Shopping
                        </a>
                    </div>

                    <!-- Right: Total + Checkout -->
                    <div class="flex items-center gap-4">
                        <div class="text-right">
                            <span class="text-lg font-medium mr-2">Total:</span>
                            <span class="text-xl font-bold text-dark">${{ number_format($grandTotal, 2) }}</span>
                        </div>

                        <a href="{{ route('checkout.index') }}"
                            class="px-6 py-3 bg-primary hover:bg-primary/90 text-white font-medium rounded transition-colors">
                            Proceed to checkout
                        </a>
                    </div>
                </div>
            @endif
        </section>


    </div>

@endsection
