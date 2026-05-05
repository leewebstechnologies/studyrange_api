<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ResourceController extends Controller
{
    public function AllResources() {
        $resource = Resource::latest()->get();
        return view('backend.resource.all_resources', compact('resource'));
    }
    // End Method

    public function AddResource() {
        return view('backend.resource.add_resource');
    }
    // End Method

    public function StoreResource(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/resource/'.$name_gen));
            $save_url = 'upload/resource/'.$name_gen;

            Resource::create([
                'title' => $request->title,
                'tag' => $request->tag,
                'tagColor' => $request->tagColor,
                'readTime' => $request->readTime,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Resource Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.resources')->with($notification);

    }
    // End Method

    public function EditResource(int $id) {
        $resource = Resource::find($id);
        return view('backend.resource.edit_resource', compact('resource'));
    }
    // End Method

    public function UpdateResource(Request $request) {
        $resource_id = $request->id;
        $resource = Resource::findOrFail($resource_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/resource/'.$name_gen));
            $save_url = 'upload/resource/'.$name_gen;

            // delete old image safely
            if ($resource->image && file_exists(public_path($resource->image))) {
                unlink(public_path($resource->image));
            }

            $resource->update([
                'title' => $request->title,
                'tag' => $request->tag,
                'tagColor' => $request->tagColor,
                'readTime' => $request->readTime,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'Resource Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $resource->update([
                'title' => $request->title,
                'tag' => $request->tag,
                'tagColor' => $request->tagColor,
                'readTime' => $request->readTime,
            ]);

            $notification = [
                'message' => 'Resource Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.resources')->with($notification);
    }
    // End Method

    public function DeleteResource(int $id) {
        $item = Resource::find($id);
        $img = $item->image;
        unlink($img);

        Resource::find($id)->delete();

         $notification = array(
            'message' => 'Resource Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

     // Resource API
    public function ApiAllResources() {
        $resource = Resource::latest()->get();
        return $resource;
    }

}
