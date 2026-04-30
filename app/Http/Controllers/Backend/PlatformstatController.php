<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Platformstat;
use Illuminate\Http\Request;

class PlatformstatController extends Controller
{
     public function AllPlatformstats() {
        $platformstat = Platformstat::latest()->get();
        return view('backend.platformstat.all_platformstats', compact('platformstat'));
    }

    public function AddPlatformstat() {
        return view('backend.platformstat.add_platformstat');
    }

    public function StorePlatformstat(Request $request) {

        Platformstat::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

            $notification = [
            'message' => 'Platform Stat Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.platformstats')->with($notification);
    }

    public function EditPlatformstat(int $id) {
        $platformstat = Platformstat::findOrFail($id);
        return view('backend.platformstat.edit_platformstat', compact('platformstat'));
    }

    public function UpdatePlatformstat(Request $request) {
        $platformstat = Platformstat::findOrFail($request->id);
        $platformstat->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'message' => 'Platform Stat Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.platformstats')->with($notification);
    }

    public function DeletePlatformstat(int $id) {
        Platformstat::findOrFail($id)->delete();

        $notification = [
            'message' => 'Platform Stat Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

     // Platform Stat API
    public function ApiAllPlatformstats() {
        $platformstat = Platformstat::latest()->get();
        return $platformstat;
    }

}
