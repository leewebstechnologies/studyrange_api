<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
// use Illuminate\Http\Request;

class BookingController extends Controller
{
     public function Booking() {
        $booking = Booking::latest()->get();
        return view('backend.booking.all_bookings', compact('booking'));
    }

    // Message API
    // public function ApiMessage(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'subject' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'message' => 'required|string',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     Booking::create($request->all());
    //     return response()->json(['message' => 'Booking created successfully'], 201);
    // }

}
