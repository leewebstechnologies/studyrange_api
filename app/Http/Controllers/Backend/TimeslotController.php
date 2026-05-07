<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
      public function AllTimeslots() {
        $timeslot = Timeslot::latest()->get();
        return view('backend.timeslot.all_timeslots', compact('timeslot'));
    }

    public function AddTimeslot() {
        return view('backend.timeslot.add_timeslot');
    }

    public function StoreTimeslot(Request $request) {

        Timeslot::create([
            'time' => $request->time,
        ]);

        $notification = [
            'message' => 'Timeslot Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.timeslots')->with($notification);
    }

    public function EditTimeslot(int $id) {
        $timeslot = Timeslot::findOrFail($id);
        return view('backend.timeslot.edit_timeslot', compact('timeslot'));
    }

    public function UpdateTimeslot(Request $request) {
        $timeslot = Timeslot::findOrFail($request->id);
        $timeslot->update([
            'time' => $request->time,
        ]);

        $notification = [
            'message' => 'Timeslot Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.timeslots')->with($notification);
    }

    public function DeleteTimeslot(int $id) {
        Timeslot::findOrFail($id)->delete();

        $notification = [
            'message' => 'Timeslot Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Timeslot API
    public function ApiAllTimeslots() {
        $timeslot = Timeslot::latest()->get();
        return $timeslot;
    }
}
