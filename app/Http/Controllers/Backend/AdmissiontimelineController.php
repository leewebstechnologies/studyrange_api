<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admissiontimeline;
use Illuminate\Http\Request;

class AdmissiontimelineController extends Controller
{
    public function AllAdmissiontimelines() {
        $admissiontimeline = Admissiontimeline::latest()->get();
        return view('backend.admissiontimeline.all_admissiontimelines', compact('admissiontimeline'));
    }

    public function AddAdmissiontimeline() {
        return view('backend.admissiontimeline.add_admissiontimeline');
    }

    public function StoreAdmissiontimeline(Request $request) {

        Admissiontimeline::create([
            'content' => $request->content,
        ]);

            $notification = [
            'message' => 'Admission Service Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.admissiontimelines')->with($notification);
    }

    public function EditAdmissiontimeline($id) {
        $admissiontimeline = Admissiontimeline::findOrFail($id);
        return view('backend.admissiontimeline.edit_admissiontimeline', compact('admissiontimeline'));
    }

    public function UpdateAdmissiontimeline(Request $request) {
        $admissiontimeline = Admissiontimeline::findOrFail($request->id);
        $admissiontimeline->update([
            'content' => $request->content,
        ]);

        $notification = [
            'message' => 'Admission Timeline Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.admissiontimelines')->with($notification);
    }

    public function DeleteAdmissiontimeline($id) {
        Admissiontimeline::findOrFail($id)->delete();

        $notification = [
            'message' => 'Admission Timeline Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

     // Admission Timeline API
    public function ApiAllAdmissiontimelines() {
        $admissiontimeline = Admissiontimeline::latest()->get();
        return $admissiontimeline;
    }

}
