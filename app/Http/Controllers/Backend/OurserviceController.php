<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ourservice;
use Illuminate\Http\Request;

class OurserviceController extends Controller
{
     public function AllOurservices() {
        $ourservice = Ourservice::latest()->get();
        return view('backend.ourservice.all_ourservices', compact('ourservice'));
    }

    public function AddOurservice() {
        return view('backend.ourservice.add_ourservice');
    }

    public function StoreOurservice(Request $request) {

        Ourservice::create([
            'title' => $request->title,
        ]);

        $notification = [
            'message' => 'Our Service Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.ourservices')->with($notification);
    }

    public function EditOurservice($id) {
        $ourservice = Ourservice::findOrFail($id);
        return view('backend.ourservice.edit_ourservice', compact('ourservice'));
    }

    public function UpdateOurservice(Request $request) {
        $ourservice = Ourservice::findOrFail($request->id);
        $ourservice->update([
            'title' => $request->title,
        ]);

        $notification = [
            'message' => 'Our Service Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.ourservices')->with($notification);
    }

    public function DeleteOurservice($id) {
        Ourservice::findOrFail($id)->delete();

        $notification = [
            'message' => 'Our Service Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

     // Ourservice API
    public function ApiAllOurservices() {
        $ourservice = Ourservice::latest()->get();
        return $ourservice;
    }

}
