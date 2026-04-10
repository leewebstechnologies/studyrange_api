<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AboutController extends Controller
{
    public function AllAbout() {
        $about = About::latest()->get();
        return view('backend.about.all_about', compact('about'));
    }
    // End Method

    public function AddAbout() {
        return view('backend.about.add_about');
    }
    // End Method

    public function StoreAbout(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/about/'.$name_gen));
            $save_url = 'upload/about/'.$name_gen;

            About::create([
                'title' => $request->title,
                'story' => $request->story,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'About Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.about')->with($notification);

    }
    // End Method

    public function EditAbout($id) {
        $about = About::find($id);
        return view('backend.about.edit_about', compact('about'));
    }
    // End Method

    public function UpdateAbout(Request $request) {
        $about_id = $request->id;
        $about = About::findOrFail($about_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/about/'.$name_gen));
            $save_url = 'upload/about/'.$name_gen;

            // delete old image safely
            if ($about->image && file_exists(public_path($about->image))) {
                unlink(public_path($about->image));
            }

            $about->update([
                'title' => $request->title,
                'story' => $request->story,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'About Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $about->update([
                'title' => $request->title,
                'story' => $request->story,
            ]);

            $notification = [
                'message' => 'About Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.about')->with($notification);
    }
    // End Method

    public function DeleteHero($id) {
        $item = About::find($id);
        $img = $item->image;
        unlink($img);

        About::find($id)->delete();

         $notification = array(
            'message' => 'About Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

}
