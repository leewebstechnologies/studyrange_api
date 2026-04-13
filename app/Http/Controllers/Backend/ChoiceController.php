<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Choice;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ChoiceController extends Controller
{
     public function AllChoices() {
        $choice = Choice::latest()->get();
        return view('backend.choice.all_choices', compact('choice'));
    }
    // End Method

    public function AddChoice() {
        return view('backend.choice.add_choice');
    }
    // End Method

    public function StoreChoice(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/choice/'.$name_gen));
            $save_url = 'upload/choice/'.$name_gen;

            Choice::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Choice Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.choices')->with($notification);

    }
    // End Method

    public function EditChoice($id) {
        $choice = Choice::find($id);
        return view('backend.choice.edit_choice', compact('choice'));
    }
    // End Method

    public function UpdateChoice(Request $request) {
        $choice_id = $request->id;
        $choice = Choice::findOrFail($choice_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/choice/'.$name_gen));
            $save_url = 'upload/choice/'.$name_gen;

            // delete old image safely
            if ($choice->image && file_exists(public_path($choice->image))) {
                unlink(public_path($choice->image));
            }

            $choice->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'Choice Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $choice->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $notification = [
                'message' => 'Choice Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.choices')->with($notification);
    }
    // End Method

    public function DeleteChoice($id) {
        $item = Choice::find($id);
        $img = $item->image;
        unlink($img);

        Choice::find($id)->delete();

         $notification = array(
            'message' => 'Choice Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

    // Choice API
    public function ApiAllChoices() {
        $choice = Choice::latest()->get();
        return $choice;
    }

}
