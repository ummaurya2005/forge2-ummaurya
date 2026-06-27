<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\OrganizationResource;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display all organizations.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $organizations = Organization::when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return OrganizationResource::collection($organizations);
    }

    /**
     * Store a newly created organization.
     */
    public function store(StoreOrganizationRequest $request): JsonResponse
    {
        $organization = Organization::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Organization created successfully.',
            'data' => new OrganizationResource($organization)
        ], 201);
    }

    /**
     * Display a specific organization.
     */
    public function show(Organization $organization): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => new OrganizationResource($organization)
        ]);
    }

    /**
     * Update an organization.
     */
    public function update(UpdateOrganizationRequest $request, Organization $organization): JsonResponse
    {
        $organization->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Organization updated successfully.',
            'data' => new OrganizationResource($organization)
        ]);
    }

    /**
     * Delete an organization.
     */
    public function destroy(Organization $organization): JsonResponse
    {
        $organization->delete();

        return response()->json([
            'success' => true,
            'message' => 'Organization deleted successfully.'
        ]);
    }
}