<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTravelerRequest;
use App\Http\Requests\UpdateTravelerRequest;
use Illuminate\Http\Request;
use App\Models\Traveler;
use App\Http\Resources\TravelerResource;

class TravelerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $traveler = Traveler::with('bookings')->latest()->paginate(10);
        // return TravelerResource::collection($traveler);
            $query = Traveler::query()->with('bookings');
        // --- Filtering ---
            $query->when($request->query('address'), function ($q, $address) {
                $q->where('address', $address);
            });

            $query->when($request->boolean('active'), function ($q) {
                $q->where('active', true);
            });
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTravelerRequest $request)
    {
        $traveler = Traveler::create($request->validated());
        return new TravelerResource($traveler);
    }


    /**
     * Display the specified resource.
     */
    public function show(Traveler $traveler)
    {
        return new TravelerResource($traveler)->load('bookings.package');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelerRequest $request, Traveler $traveler)
    {
        $traveler->update($request->validated());
        return new TravelerResource($traveler);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Traveler $traveler)
    {
        $traveler->delete();
        return response()->json([
            'massage' => 'Traveler deleted successfully'
        ]);
    }
}
