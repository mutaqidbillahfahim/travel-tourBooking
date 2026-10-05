<?php

namespace App\Http\Controllers;

use App\Models\Itinery;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItineryRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Requests\UpdateItineryRequest;

class ItineryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itinery = Itinery::with('package')->latest()->paginate(20);
        return response()->json($itinery);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItineryRequest $request)
    {
        $itinery = Itinery::create($request ->validated());
            return response()->json($itinery,201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Itinery $itinery)
    {
        return $itinery->load('package');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItineryRequest $request, Itinery $itinery)
    {
        $itinery->update($request->validated());
        return response()->json($itinery);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Itinery $itinery)
    {
        $itinery->delete();
        return response()->json([
            'message'=>'itinery deleted was success fully'
        ]);
    }
}
