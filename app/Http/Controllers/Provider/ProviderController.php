<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

//Requests
use App\Http\Requests\Provider\ProviderRequest;

//Resources
use App\Http\Resources\ProviderResource;

//Models
use App\Models\Provider;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        return ProviderResource::collection(Provider::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProviderRequest $request): JsonResource
    {
        $provider = Provider::create($request->all());

        return ProviderResource::make($provider);
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider): JsonResource
    {
        if (!$provider) {
            return response()->json(['message' => 'Provider not found'], 404);
        }

        return ProviderResource::make($provider);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProviderRequest $request, Provider $provider): JsonResource
    {
        if (!$provider) {
            return response()->json(['message' => 'Provider not found'], 404);
        }

        $provider->update($request->all());

        return ProviderResource::make($provider);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider): JsonResponse
    {
        if (!$provider) {
            return response()->json(['message' => 'Provider not found'], 404);
        }

        $provider->delete();

        return response()->json(['message' => 'Provider deleted successfully'], 204);
    }
}
