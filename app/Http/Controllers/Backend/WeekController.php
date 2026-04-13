<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Week;
use Illuminate\Http\Request;

class WeekController extends Controller
{
     public function AllWeeks() {
        $week = Week::latest()->get();
        return view('backend.week.all_weeks', compact('week'));
    }

    public function AddWeek() {
        return view('backend.week.add_week');
    }

    public function StoreWeek(Request $request) {

        Week::create([
            'number' => $request->number,
            'amount' => $request->amount,
        ]);

        $notification = [
            'message' => 'Week Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.weeks')->with($notification);
    }

    public function EditWeek($id) {
        $week = Week::findOrFail($id);
        return view('backend.week.edit_week', compact('week'));
    }

    public function UpdateWeek(Request $request) {
        $week = Week::findOrFail($request->id);
        $week->update([
            'number' => $request->number,
            'amount' => $request->amount,
        ]);

        $notification = [
            'message' => 'Week Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.weeks')->with($notification);
    }

    public function DeleteWeek($id) {
        Week::findOrFail($id)->delete();

        $notification = [
            'message' => 'Week Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Week API
    public function ApiAllWeeks() {
        $week = Week::latest()->get();
        return $week;
    }
}
