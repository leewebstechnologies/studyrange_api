<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
     public function Appointment() {
        $appointment = Appointment::latest()->get();
        return view('backend.appointment.all_appointments', compact('appointment'));
    }

    // Appointment API
    public function ApiAppointment(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'counselor' => 'required|string|max:255',
            'date' => 'required|string',
            'time' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Appointment::create($request->all());
        return response()->json(['message' => 'Appointment scheduled successfully'], 201);
    }

    public function DeleteAppointment(int $id) {
        Appointment::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Appointment Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
