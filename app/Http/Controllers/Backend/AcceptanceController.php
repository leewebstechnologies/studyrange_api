<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Acceptance;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AcceptanceController extends Controller
{
    public function AllAcceptances() {
        $acceptance = Acceptance::latest()->get();
        return view('backend.acceptance.all_acceptances', compact('acceptance'));
    }
    // End Method

    public function AddAcceptance() {
        return view('backend.acceptance.add_acceptance');
    }
    // End Method

    public function StoreAcceptance(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/acceptance/'.$name_gen));
            $save_url = 'upload/acceptance/'.$name_gen;

            Acceptance::create([
                'name' => $request->name,
                'text' => $request->text,
                'time' => $request->time,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Acceptance Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.acceptances')->with($notification);

    }
    // End Method

    public function EditAcceptance($id) {
        $acceptance = Acceptance::find($id);
        return view('backend.acceptance.edit_acceptance', compact('acceptance'));
    }
    // End Method

    public function UpdateAcceptance(Request $request) {
        $acceptance_id = $request->id;
        $acceptance = Acceptance::findOrFail($acceptance_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/acceptance/'.$name_gen));
            $save_url = 'upload/acceptance/'.$name_gen;

            // delete old image safely
            if ($acceptance->image && file_exists(public_path($acceptance->image))) {
                unlink(public_path($acceptance->image));
            }

            $acceptance->update([
                'name' => $request->name,
                'text' => $request->text,
                'time' => $request->time,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'Acceptance Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $acceptance->update([
                'name' => $request->name,
                'text' => $request->text,
                'time' => $request->time,
            ]);

            $notification = [
                'message' => 'Acceptance Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.acceptances')->with($notification);
    }
    // End Method

    public function DeleteAcceptance($id) {
        $item = Acceptance::find($id);
        $img = $item->image;
        unlink($img);

        Acceptance::find($id)->delete();

         $notification = array(
            'message' => 'Acceptance Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

}
