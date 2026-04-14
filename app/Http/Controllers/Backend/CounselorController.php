<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Counselor;
use Illuminate\Http\Request;

class CounselorController extends Controller
{
     public function AllCounselors() {
        $counselor = Counselor::latest()->get();
        return view('backend.counselor.all_counselors', compact('counselor'));
    }

    public function AddCounselor() {
        return view('backend.counselor.add_counselor');
    }

    public function StoreCounselor(Request $request) {

        Counselor::create([
            'name' => $request->name,
            'section' => $request->section,
            'experience' => $request->experience,
        ]);

        $notification = [
            'message' => 'Counselor Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.counselors')->with($notification);
    }

    public function EditCounselor($id) {
        $counselor = Counselor::findOrFail($id);
        return view('backend.counselor.edit_counselor', compact('counselor'));
    }

    public function UpdateCounselor(Request $request) {
        $counselor = Counselor::findOrFail($request->id);
        $counselor->update([
            'name' => $request->name,
            'section' => $request->section,
            'experience' => $request->experience,
        ]);

        $notification = [
            'message' => 'Counselor Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.counselors')->with($notification);
    }

    public function DeleteCounselor($id) {
        Counselor::findOrFail($id)->delete();

        $notification = [
            'message' => 'Counselor Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Counselor API
    public function ApiAllCounselors() {
        $counselor = Counselor::latest()->get();
        return $counselor;
    }
}
