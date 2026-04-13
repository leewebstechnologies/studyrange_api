<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function AllServices() {
        $service = Service::latest()->get();
        return view('backend.service.all_services', compact('service'));
    }

    public function AddService() {
        return view('backend.service.add_service');
    }

    public function StoreService(Request $request) {

        Service::create([
            'title' => $request->title,
            'desc' => $request->desc,
        ]);

        $notification = [
            'message' => 'Service Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.services')->with($notification);
    }

    public function EditService($id) {
        $service = Service::findOrFail($id);
        return view('backend.service.edit_service', compact('service'));
    }

    public function UpdateService(Request $request) {
        $service = Service::findOrFail($request->id);
        $service->update([
            'title' => $request->title,
            'desc' => $request->desc,
        ]);

        $notification = [
            'message' => 'Service Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.services')->with($notification);
    }

    public function DeleteService($id) {
        Service::findOrFail($id)->delete();

        $notification = [
            'message' => 'Service Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Service API
    public function ApiAllServices() {
        $service = Service::latest()->get();
        return $service;
    }
}
