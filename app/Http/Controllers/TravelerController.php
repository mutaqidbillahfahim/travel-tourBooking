<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTravelerRequest;
use App\Http\Requests\UpdateTravelerRequest;
use App\Http\Resources\TravelerResource;
use App\Models\Traveler;
use Illuminate\Http\Request;

class TravelerController extends Controller
{
    /**
     * Display a listing of travelers.
     */
    public function index(Request $request)
    {
        $query = Traveler::query()->with('bookings');

        // Filtering
        $query->when($request->query('address'), function ($q, $address) {
            $q->where('address', $address);
        });

        // Searching
        $query->when($request->query('search'), function ($q, $term) {
            $q->where(function ($inner) use ($term) {
                $inner->where('name', 'like', "%{$term}%")
                    ->orWhere('email', 'like', "%{$term}%")
                    ->orWhere('address', 'like', "%{$term}%");
            });
        });

        // Sorting
        $sortable = ['name', 'created_at'];
        $sort = $request->query('sort', 'created_at');
        $direction = $request->query('direction', 'desc');

        if (!in_array($sort, $sortable)) {
            $sort = 'created_at';
        }

        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        $query->orderBy($sort, $direction);

        // Pagination
        $perPage = (int) $request->query('per_page', 10);

        $perPage = max(1, min($perPage, 100));

        return TravelerResource::collection(
            $query->paginate($perPage)
        );
    }

    /**
     * Store a newly created traveler.
     */
    public function store(StoreTravelerRequest $request)
    {
        $traveler = Traveler::create($request->validated());

        return new TravelerResource($traveler);
    }

    /**
     * Display the specified traveler.
     */
    public function show(Traveler $traveler)
    {
        return new TravelerResource(
            $traveler->load('bookings.package')
        );
    }

    /**
     * Update the specified traveler.
     */
    public function update(
        UpdateTravelerRequest $request,
        Traveler $traveler
    ) {
        $traveler->update($request->validated());

        return new TravelerResource($traveler);
    }

    /**
     * Remove the specified traveler.
     */
    public function destroy(Traveler $traveler)
    {
        $traveler->delete();

        return response()->json([
            'message' => 'Traveler deleted successfully',
        ]);
    }
}
