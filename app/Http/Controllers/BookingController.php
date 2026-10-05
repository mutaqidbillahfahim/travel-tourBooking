<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdatBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::with('traveler')->latest()->paginate(15);
        return response()->json($booking);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $booking = Booking::create($request->validated());
        return response()->json($booking, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return $booking->load('traveler', 'package');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $booking->update($request->validated());
        return response()->json($booking);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json([
            'message' => 'booking deleted was success fully'
        ]);
    }
}
