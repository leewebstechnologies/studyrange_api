<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Success;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SuccessController extends Controller
{
     public function AllSuccesses() {
        $success = Success::latest()->get();
        return view('backend.success.all_successes', compact('success'));
    }
    // End Method

    public function AddSuccess() {
        return view('backend.success.add_success');
    }
    // End Method

    public function StoreSuccess(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/success/'.$name_gen));
            $save_url = 'upload/success/'.$name_gen;

            Success::create([
                'name' => $request->name,
                'school' => $request->school,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Success Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.successes')->with($notification);

    }
    // End Method

    public function EditSuccess($id) {
        $success = Success::find($id);
        return view('backend.success.edit_success', compact('success'));
    }
    // End Method

    public function UpdateSuccess(Request $request) {
        $success_id = $request->id;
        $success = Success::findOrFail($success_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/success/'.$name_gen));
            $save_url = 'upload/success/'.$name_gen;

            // delete old image safely
            if ($success->image && file_exists(public_path($success->image))) {
                unlink(public_path($success->image));
            }

            $success->update([
                'name' => $request->name,
                'school' => $request->school,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'Success Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $success->update([
                'name' => $request->name,
                'school' => $request->school,
            ]);

            $notification = [
                'message' => 'Success Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.successes')->with($notification);
    }
    // End Method

    public function DeleteSuccess($id) {
        $item = Success::find($id);
        $img = $item->image;
        unlink($img);

        Success::find($id)->delete();

         $notification = array(
            'message' => 'Success Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

}
