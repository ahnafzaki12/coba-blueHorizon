@extends('dashboard.layouts.main')

@section('container')
    <div class="container mx-auto px-4 py-8 max-w-md mb-7">
        <section class="bg-white rounded-lg shadow-md p-6 border border-light">
            <h3 class="text-2xl font-medium text-dark mb-6">Add Products</h3>
            <form action="{{ route('products.store') }}" class="space-y-4 addProduct" method="post"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-dark mb-1">Product Name</label>
                    <input id="name" name="name" type="text" placeholder="Enter product name"
                        class="w-full px-4 py-2 rounded-md border border-light focus:outline-none focus:ring-2 focus:ring-accent transition-colors
            {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('name') }}" />
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-dark mb-1">Product Price</label>
                    <input id="price" name="price" type="number" min="0" placeholder="Enter product price"
                        class="w-full px-4 py-2 rounded-md border border-light focus:outline-none focus:ring-2 focus:ring-accent transition-colors
            {{ $errors->has('price') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('price') }}" />
                    @error('price')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="stock" class="block text-sm font-medium text-dark mb-1">Product Stock</label>
                    <input id="stock" name="stock" type="number" min="0" placeholder="Enter product stock"
                        class="w-full px-4 py-2 rounded-md border border-light focus:outline-none focus:ring-2 focus:ring-accent transition-colors
            {{ $errors->has('stock') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('stock') }}" />
                    @error('stock')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-dark mb-1">Product Image</label>
                    <div class="flex items-center">
                        <label
                            class="flex items-center justify-center px-4 py-2 bg-light hover:bg-opacity-80 text-primary rounded-l-md border border-light cursor-pointer transition-colors">
                            <span>Browse</span>
                            <input id="image" name="image" type="file" class="hidden" required
                                accept="image/png, image/jpg, image/jpeg" onchange="handleFileChange(event)" />
                        </label>
                        <span
                            class="flex-1 px-4 py-2 border border-l-0 border-light rounded-r-md text-sm truncate file-name">
                            No file chosen
                        </span>
                    </div>
                    <div id="image-preview-container" class="mt-2" style="display:none;">
                        <p class="text-sm text-gray-600 mb-2">Current image:</p>
                        <img id="image-preview" class="h-48 w-auto object-cover rounded-md border border-gray-200"
                            alt="Image Preview" />
                    </div>
                    @error('image')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" name="addProduct"
                    class="w-full bg-primary hover:bg-secondary text-white font-medium py-2 px-4 rounded-md transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">Add
                    Product</button>
            </form>

        </section>
    </div>

    <script>
        function handleFileChange(event) {
            const fileInput = event.target;
            const fileNameSpan = fileInput.closest('div').querySelector('.file-name');
            const previewContainer = document.getElementById('image-preview-container');
            const imagePreview = document.getElementById('image-preview');

            // Update file name
            const fileName = fileInput.files[0]?.name || "No file chosen";
            fileNameSpan.textContent = fileName;

            // Display image preview
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    previewContainer.style.display = 'block'; // Show preview container
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
@endsection
