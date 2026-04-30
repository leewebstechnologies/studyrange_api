<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admissionservice;

class AdmissionserviceController extends Controller
{
    public function AllAdmissionservices() {
        $admissionservice = Admissionservice::latest()->get();
        return view('backend.admissionservice.all_admissionservices', compact('admissionservice'));
    }

    public function AddAdmissionservice() {
        return view('backend.admissionservice.add_admissionservice');
    }

    public function StoreAdmissionservice(Request $request) {

        Admissionservice::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

            $notification = [
            'message' => 'Admission Service Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.admissionservices')->with($notification);
    }

    public function EditAdmissionservice($id) {
        $admissionservice = Admissionservice::findOrFail($id);
        return view('backend.admissionservice.edit_admissionservice', compact('admissionservice'));
    }

    public function UpdateAdmissionservice(Request $request) {
        $admissionservice = Admissionservice::findOrFail($request->id);
        $admissionservice->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'message' => 'Admission Service Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.admissionservices')->with($notification);
    }

    public function DeleteAdmissionservice($id) {
        Admissionservice::findOrFail($id)->delete();

        $notification = [
            'message' => 'AdmissionService Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Admissionservice API
    public function ApiAllAdmissionservices() {
        $admissionservice = Admissionservice::latest()->get();
        return $admissionservice;
    }
}
