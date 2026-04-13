<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Live;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function AllLives() {
        $live = Live::latest()->get();
        return view('backend.live.all_lives', compact('live'));
    }

    public function AddLive() {
        return view('backend.live.add_live');
    }

    public function StoreLive(Request $request) {

        Live::create([
            'name' => $request->name,
            'school' => $request->school,
            'time' => $request->time,
        ]);

        $notification = [
            'message' => 'Live Acceptance Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.lives')->with($notification);
    }

    public function EditLive($id) {
        $live = Live::findOrFail($id);
        return view('backend.live.edit_live', compact('live'));
    }

    public function UpdateLive(Request $request) {
        $live = Live::findOrFail($request->id);
        $live->update([
            'name' => $request->name,
            'school' => $request->school,
            'time' => $request->time,
        ]);

        $notification = [
            'message' => 'Live Acceptance Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.lives')->with($notification);
    }

    public function DeleteLive($id) {
        Live::findOrFail($id)->delete();

        $notification = [
            'message' => 'Live Acceptance Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Live API
    public function ApiAllLives() {
        $live = Live::latest()->get();
        return $live;
    }
    
}
