<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admissionrequirement;
use Illuminate\Http\Request;

class AdmissionrequirementController extends Controller
{
    public function AllAdmissionrequirements() {
        $admissionrequirement = Admissionrequirement::latest()->get();
        return view('backend.admissionrequirement.all_admissionrequirements', compact('admissionrequirement'));
    }

    public function AddAdmissionrequirement() {
        return view('backend.admissionrequirement.add_admissionrequirement');
    }

    public function StoreAdmissionrequirement(Request $request) {

        Admissionrequirement::create([
            'content' => $request->content,
        ]);

            $notification = [
            'message' => 'Admission Requirement Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.admissionrequirements')->with($notification);
    }

    public function EditAdmissionrequirement($id) {
        $admissionrequirement = Admissionrequirement::findOrFail($id);
        return view('backend.admissionrequirement.edit_admissionrequirement', compact('admissionrequirement'));
    }

    public function UpdateAdmissionrequirement(Request $request) {
        $admissionrequirement = Admissionrequirement::findOrFail($request->id);
        $admissionrequirement->update([
            'content' => $request->content,
        ]);

        $notification = [
            'message' => 'Admission Requirement Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.admissionrequirements')->with($notification);
    }

    public function DeleteAdmissionrequirement($id) {
        Admissionrequirement::findOrFail($id)->delete();

        $notification = [
            'message' => 'Admission Requirement Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Admission Requirement API
    public function ApiAllAdmissionrequirements() {
        $admissionrequirement = Admissionrequirement::latest()->get();
        return $admissionrequirement;
    }

}
