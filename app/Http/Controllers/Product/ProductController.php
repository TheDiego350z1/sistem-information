<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

use App\Http\Requests\Product\ProductRequest;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//Resources
use App\Http\Resources\ProductResource;

//Models
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        return ProductResource::collection(Product::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        if (!$request->has('slug')) {
            $baseSlug = Str::of($request->name)->slug('-');
            $slug = Product::where('slug', $baseSlug)->exists()
                ? $baseSlug . '-' . time()
                : $baseSlug;

            $request->merge(['slug' => $slug]);
        }

        $product = Product::create($request->all());

        return ProductResource::make($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): JsonResource|JsonResponse
    {
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return ProductResource::make($product->load('provider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        if (!$request->has('slug')) {
            $baseSlug = Str::of($request->name)->slug('-');
            $slug = Product::where('slug', $baseSlug)
                ->where('id', '!=', $product->id)
                ->exists()
                ? $baseSlug . '-' . time()
                : $baseSlug;

            $request->merge(['slug' => $slug]);
        }
        $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 204);
    }
}
