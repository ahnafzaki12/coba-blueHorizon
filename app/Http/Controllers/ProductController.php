<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,jpg,png|', // Validate image type and size
        ]);

        // If there is an image uploaded, store it
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('product-images', 'public');
        }

        // Create the product using the validated data
        Product::create($validatedData);

        // Redirect back to the product page with a success message
        return redirect()->route('products.index')->with('add', 'New product has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id); // Get the product by ID
        return view('dashboard.products.edit', compact('product')); // Pass the product to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validation rules
        $rules = [
            'name' => 'required|max:255|min:3',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:1024', // Allow image upload, max 1MB
        ];

        // Validate the request data
        $validatedData = $request->validate($rules);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // If there's an old image, delete it
            if ($product->image) {
                Storage::delete($product->image);
            }

            // Store the new image and update the image path in the data
            $validatedData['image'] = $request->file('image')->store('product-images', 'public');
        }

        // Update the product with validated data
        $product->update($validatedData);

        // Redirect back to the product page with a success message
        return redirect()->route('products.index')->with('success', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product has been deleted');
    }
}
