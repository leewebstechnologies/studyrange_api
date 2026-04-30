<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function AllJourneys() {
        $journey = Journey::latest()->get();
        return view('backend.journey.all_journeys', compact('journey'));
    }

    public function AddJourney() {
        return view('backend.journey.add_journey');
    }

    public function StoreJourney(Request $request) {

        Journey::create([
            'year' => $request->year,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'message' => 'Journey Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.journeys')->with($notification);
    }

    public function EditJourney(int $id) {
        $journey = Journey::findOrFail($id);
        return view('backend.journey.edit_journey', compact('journey'));
    }

    public function UpdateJourney(Request $request) {
        $journey = Journey::findOrFail($request->id);
        $journey->update([
            'year' => $request->year,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'message' => 'Journey Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.journeys')->with($notification);
    }

    public function DeleteJourney(int $id) {
        Journey::findOrFail($id)->delete();

        $notification = [
            'message' => 'Journey Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Journey API
    public function ApiAllJourneys() {
        $journey = Journey::latest()->get();
        return $journey;
    }
}
