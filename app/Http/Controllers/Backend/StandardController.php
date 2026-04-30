<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Standard;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class StandardController extends Controller
{
     public function AllStandards() {
        $standard = Standard::latest()->get();
        return view('backend.standard.all_standards', compact('standard'));
    }
    // End Method

    public function AddStandard() {
        return view('backend.standard.add_standard');
    }
    // End Method

    public function StoreStandard(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/standard/'.$name_gen));
            $save_url = 'upload/standard/'.$name_gen;

            Standard::create([
                'title' => $request->title,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Standard Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.standards')->with($notification);

    }
    // End Method

    public function EditStandard($id) {
        $standard = Standard::find($id);
        return view('backend.standard.edit_standard', compact('standard'));
    }
    // End Method

    public function UpdateStandard(Request $request) {
        $standard_id = $request->id;
        $standard = Standard::findOrFail($standard_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/standard/'.$name_gen));
            $save_url = 'upload/standard/'.$name_gen;

            // delete old image safely
            if ($standard->image && file_exists(public_path($standard->image))) {
                unlink(public_path($standard->image));
            }

            $standard->update([
                'title' => $request->title,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'Standard Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $standard->update([
                'title' => $request->title,
            ]);

            $notification = [
                'message' => 'Standard Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.standards')->with($notification);
    }
    // End Method

    public function DeleteStandard($id) {
        $item = Standard::find($id);
        $img = $item->image;
        unlink($img);

        Standard::find($id)->delete();

         $notification = array(
            'message' => 'Standard Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

    // Standard API
    public function ApiAllStandards() {
        $standard = Standard::latest()->get();
        return $standard;
    }

}
