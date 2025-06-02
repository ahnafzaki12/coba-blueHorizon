@extends('dashboard.layouts.main')

@section('container')
    <section class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-sm border border-gray-200 mt-5">
        <h2 class="text-2xl font-bold text-dark mb-6 pb-2 border-b border-gray-200">
            Edit Product
        </h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('put')

            <!-- Product Name -->
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-dark">
                    Product Name
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                    placeholder="Enter product name"
                    class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary
            {{ $errors->has('name') ? 'border-red-500' : '' }}"
                    required />
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Product Price -->
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-dark">
                    Product Price
                </label>
                <input type="number" id="price" name="price" min="0" step="0.01"
                    value="{{ old('price', $product->price) }}" placeholder="Enter product price"
                    class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary
            {{ $errors->has('price') ? 'border-red-500' : '' }}"
                    required />
                @error('price')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Product Stock -->
            <div>
                <label for="stock" class="block mb-2 text-sm font-medium text-dark">
                    Product Stock
                </label>
                <input type="number" id="stock" name="stock" min="0"
                    value="{{ old('stock', $product->stock) }}" placeholder="Enter product stock"
                    class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary
            {{ $errors->has('stock') ? 'border-red-500' : '' }}"
                    required />
                @error('stock')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Product Image -->
            <div>
                <label for="image" class="block mb-2 text-sm font-medium text-dark">
                    Product Image
                </label>
                <div class="flex">
                    <label for="image"
                        class="flex items-center justify-center px-4 py-2 bg-light text-primary rounded-l-md border border-gray-300 cursor-pointer hover:bg-gray-50">
                        Browse
                        <input type="file" id="image" name="image" accept="image/png, image/jpg, image/jpeg"
                            class="hidden" onchange="displayImagePreview(this)" />
                    </label>
                    <span
                        class="flex-1 px-3 py-2 border border-l-0 border-gray-300 rounded-r-md text-sm text-gray-700 truncate">
                        @if ($product->image)
                            {{ basename($product->image) }}
                        @else
                            No file chosen
                        @endif
                    </span>
                </div>
                @error('image')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Current Image Preview (if exists) -->
            @if ($product->image)
                <div class="mt-2">
                    <p class="text-sm text-gray-600 mb-2">Current image:</p>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }} "
                        class="h-48 w-auto object-cover rounded-md border border-gray-200">
                </div>
            @endif

            <button type="submit" name="update_product"
                class="w-full px-4 py-2 bg-primary text-white font-medium rounded-md hover:bg-secondary transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Save Changes
            </button>
        </form>

    </section>

    <script>
        function displayImagePreview(input) {
            const fileNameDisplay = input.parentElement.nextElementSibling;
            if (input.files && input.files[0]) {
                fileNameDisplay.textContent = input.files[0].name;
            } else {
                fileNameDisplay.textContent = 'No file chosen';
            }
        }
    </script>
@endsection
