<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admissionprocess;

class AdmissionprocessController extends Controller
{
    public function AllAdmissionprocesses() {
        $admissionprocess = Admissionprocess::latest()->get();
        return view('backend.admissionprocess.all_admissionprocesses', compact('admissionprocess'));
    }

    public function AddAdmissionprocess() {
        return view('backend.admissionprocess.add_admissionprocess');
    }

    public function StoreAdmissionprocess(Request $request) {

        Admissionprocess::create([
            'content' => $request->content,
        ]);

            $notification = [
            'message' => 'Admission Process Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.admissionprocesses')->with($notification);
    }

    public function EditAdmissionprocess($id) {
        $admissionprocess = Admissionprocess::findOrFail($id);
        return view('backend.admissionprocess.edit_admissionprocess', compact('admissionprocess'));
    }

    public function UpdateAdmissionprocess(Request $request) {
        $admissionprocess = Admissionprocess::findOrFail($request->id);
        $admissionprocess->update([
            'content' => $request->content,
        ]);

        $notification = [
            'message' => 'Admission Process Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.admissionprocesses')->with($notification);
    }

    public function DeleteAdmissionprocess($id) {
        Admissionprocess::findOrFail($id)->delete();

        $notification = [
            'message' => 'Admission Process Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Admissionprocess API
    public function ApiAllAdmissionprocesses() {
        $admissionprocess = Admissionprocess::latest()->get();
        return $admissionprocess;
    }
}
