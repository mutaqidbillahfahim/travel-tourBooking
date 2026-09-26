<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreTravelerRequest;
use App\Http\Requests\UpdateTravelerRequest;
use Illuminate\Http\Request;
use App\Models\Traveler;

class TravelerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Traveler::with('bookings')->latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTravelerRequest $request)
{
    $traveler = Traveler::create($request->validated());
    return response()->json($traveler, 201);
}


    /**
     * Display the specified resource.
     */
    public function show(Traveler $traveler)
    {
       return $traveler->load('bookings.package');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelerRequest $request, Traveler $traveler )
    {
       $traveler->update($request->validated());
    return $traveler;   

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Traveler $traveler)
    {
        $traveler->delete();
        return response()->noContent( );
    }
}
