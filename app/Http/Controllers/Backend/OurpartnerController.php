<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ourpartner;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class OurpartnerController extends Controller
{
    public function AllOurpartners() {
        $ourpartner = Ourpartner::latest()->get();
        return view('backend.ourpartner.all_ourpartners', compact('ourpartner'));
    }
    // End Method

    public function AddOurpartner() {
        return view('backend.ourpartner.add_ourpartner');
    }
    // End Method

    public function StoreOurpartner(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/ourpartner/'.$name_gen));
            $save_url = 'upload/ourpartner/'.$name_gen;

            Ourpartner::create([
                'title' => $request->title,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Our Partner Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.ourpartners')->with($notification);

    }
    // End Method

    public function EditOurpartner($id) {
        $ourpartner = Ourpartner::find($id);
        return view('backend.ourpartner.edit_ourpartner', compact('ourpartner'));
    }
    // End Method

    public function UpdateOurpartner(Request $request) {
        $ourpartner_id = $request->id;
        $ourpartner = Ourpartner::findOrFail($ourpartner_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/ourpartner/'.$name_gen));
            $save_url = 'upload/ourpartner/'.$name_gen;

            // delete old image safely
            if ($ourpartner->image && file_exists(public_path($ourpartner->image))) {
                unlink(public_path($ourpartner->image));
            }

            $ourpartner->update([
                'title' => $request->title,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'Our Partner Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $ourpartner->update([
                'title' => $request->title,
            ]);

            $notification = [
                'message' => 'Our Partner Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.ourpartners')->with($notification);
    }
    // End Method

    public function DeleteOurpartner($id) {
        $item = Ourpartner::find($id);
        $img = $item->image;
        unlink($img);

        Ourpartner::find($id)->delete();

         $notification = array(
            'message' => 'Our Partner Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

    // Ourpartner API
    public function ApiAllOurpartners() {
        $ourpartner = Ourpartner::latest()->get();
        return $ourpartner;
    }

}
