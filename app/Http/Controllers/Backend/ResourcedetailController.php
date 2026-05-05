<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Resourcedetail;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ResourcedetailController extends Controller
{
     public function AllResourcedetails() {
        $resourcedetail = Resourcedetail::latest()->get();
        return view('backend.resourcedetail.all_resourcedetails', compact('resourcedetail'));
    }
    // End Method

    public function AddResourcedetail() {
        return view('backend.resourcedetail.add_resourcedetail');
    }
    // End Method

    public function StoreResourcedetail(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/resource/'.$name_gen));
            $save_url = 'upload/resource/'.$name_gen;

            Resourcedetail::create([
                'title' => $request->title,
                'tag' => $request->tag,
                'tagColor' => $request->tagColor,
                'readTime' => $request->readTime,
                'author' => $request->author,
                'role' => $request->role,
                'date' => $request->date,
                'content' => $request->content,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Resource Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.resourcedetails')->with($notification);

    }
    // End Method

    public function EditResourcedetail(int $id) {
        $resourcedetail = Resourcedetail::find($id);
        return view('backend.resourcedetail.edit_resourcedetail', compact('resourcedetail'));
    }
    // End Method

    public function UpdateResourcedetail(Request $request) {
        $resourcedetail_id = $request->id;
        $resourcedetail = Resourcedetail::findOrFail($resourcedetail_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/resource/'.$name_gen));
            $save_url = 'upload/resource/'.$name_gen;

            // delete old image safely
            if ($resourcedetail->image && file_exists(public_path($resourcedetail->image))) {
                unlink(public_path($resourcedetail->image));
            }

            $resourcedetail->update([
                'title' => $request->title,
                'tag' => $request->tag,
                'tagColor' => $request->tagColor,
                'readTime' => $request->readTime,
                'author' => $request->author,
                'role' => $request->role,
                'date' => $request->date,
                'content' => $request->content,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'Resource Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $resourcedetail->update([
                'title' => $request->title,
                'tag' => $request->tag,
                'tagColor' => $request->tagColor,
                'readTime' => $request->readTime,
                'author' => $request->author,
                'role' => $request->role,
                'date' => $request->date,
                'content' => $request->content,
            ]);

            $notification = [
                'message' => 'Resource Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.resourcedetails')->with($notification);
    }
    // End Method

    public function DeleteResourcedetail(int $id) {
        $item = Resourcedetail::find($id);
        $img = $item->image;
        unlink($img);

        Resourcedetail::find($id)->delete();

         $notification = array(
            'message' => 'Resource Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method
    public function show(int $id) {
         return Resourcedetail::findOrFail($id);
    }



     // Resourcedetail API
    public function ApiAllResourcedetails() {
        $resourcedetail = Resourcedetail::latest()->get();
        return $resourcedetail;
    }

}
