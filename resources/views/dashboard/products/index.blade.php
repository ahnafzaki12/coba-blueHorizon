<!-- resources/views/dashboard/products/index.blade.php -->

@extends('dashboard.layouts.main')
@section('container')
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <section class="bg-white rounded-lg shadow-md overflow-hidden">
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
            @if (session()->has('add'))
                <div
                    class="alert alert-success alert-dismissible fade show bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-3">
                    <span>{{ session('add') }}</span>
                    <button type="button" class="btn-close text-green-800 hover:text-green-600" data-bs-dismiss="alert"
                        aria-label="Close">
                        &times;
                    </button>
                </div>
            @endif

            <div class="overflow-x-auto">
                @if ($products->isNotEmpty())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-primary">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Sl
                                    No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Product Image</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Product Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Product Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Product Stock</th> <!-- New Column for Stock -->
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-light">
                            @foreach ($products as $index => $product)
                                <tr class="hover:bg-light transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark">
                                        {{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="h-28 w-32 rounded-md bg-gray-200 overflow-hidden flex items-center justify-center">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }} "
                                                class="h-full w-full object-cover">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-dark">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-dark">${{ $product->price }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-dark">{{ $product->stock }} Unit</td> <!-- Display Stock -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-3">
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700 transition-colors"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="text-secondary hover:text-accent transition-colors">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div
                        class="container bg-primary text-center font-medium text-white uppercase tracking-wider mx-auto px-4 py-8 max-w-6xl">
                        No Product Available
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
