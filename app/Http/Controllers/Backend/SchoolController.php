<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SchoolController extends Controller
{
     public function AllSchools() {
        $school = School::latest()->get();
        return view('backend.school.all_schools', compact('school'));
    }
    // End Method

    public function AddSchool() {
        return view('backend.school.add_school');
    }
    // End Method

    public function StoreSchool(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/school/'.$name_gen));
            $save_url = 'upload/school/'.$name_gen;

            School::create([
                'name' => $request->name,
                'description' => $request->description,
                'tagone' => $request->tagone,
                'tagtwo' => $request->tagtwo,
                'tagthree' => $request->tagthree,
                'location' => $request->location,
                'tuition' => $request->tuition,
                'students' => $request->students,
                'acceptRate' => $request->acceptRate,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'School Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.schools')->with($notification);

    }
    // End Method

    public function EditSchool(int $id) {
        $school = School::find($id);
        return view('backend.school.edit_school', compact('school'));
    }
    // End Method

    public function UpdateSchool(Request $request) {
        $school_id = $request->id;
        $school = School::findOrFail($school_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/school/'.$name_gen));
            $save_url = 'upload/school/'.$name_gen;

            // delete old image safely
            if ($school->image && file_exists(public_path($school->image))) {
                unlink(public_path($school->image));
            }

            $school->update([
                'name' => $request->name,
                'description' => $request->description,
                'tagone' => $request->tagone,
                'tagtwo' => $request->tagtwo,
                'tagthree' => $request->tagthree,
                'location' => $request->location,
                'tuition' => $request->tuition,
                'students' => $request->students,
                'acceptRate' => $request->acceptRate,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'School Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $school->update([
                'name' => $request->name,
                'description' => $request->description,
                'tagone' => $request->tagone,
                'tagtwo' => $request->tagtwo,
                'tagthree' => $request->tagthree,
                'location' => $request->location,
                'tuition' => $request->tuition,
                'students' => $request->students,
                'acceptRate' => $request->acceptRate,
            ]);

            $notification = [
                'message' => 'School Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.schools')->with($notification);
    }
    // End Method

    public function DeleteSchool(int $id) {
        $item = School::find($id);
        $img = $item->image;
        unlink($img);

        School::find($id)->delete();

         $notification = array(
            'message' => 'School Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

     // School API
    public function ApiAllSchools() {
        $school = School::latest()->get();
        return $school;
    }
}
