<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ServiceController extends Controller
{
    public function AllServices() {
        $service = Service::latest()->get();
        return view('backend.service.all_services', compact('service'));
    }
    // End Method

    public function AddService() {
        return view('backend.service.add_service');
    }
    // End Method

    public function StoreService(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/service/'.$name_gen));
            $save_url = 'upload/service/'.$name_gen;

             Service::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Service Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.services')->with($notification);

    }
    // End Method

    public function EditService($id) {
        $service = Service::find($id);
        return view('backend.service.edit_service', compact('service'));
    }
    // End Method

    public function UpdateService(Request $request) {
        $service_id = $request->id;
        $service = Service::findOrFail($service_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/service/'.$name_gen));
            $save_url = 'upload/service/'.$name_gen;

            // delete old image safely
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            $service->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'Service Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $service->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $request->image,
            ]);

            $notification = [
                'message' => 'Service Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.services')->with($notification);
    }
    // End Method

    public function DeleteService($id) {
        $item = Service::find($id);
        $img = $item->image;
        unlink($img);

        Service::find($id)->delete();

         $notification = array(
            'message' => 'Service Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

}
