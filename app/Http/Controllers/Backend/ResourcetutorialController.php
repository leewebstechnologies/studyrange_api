<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Resourcetutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourcetutorialController extends Controller
{
     // ============================
    // READ ALL
    // ============================
    public function AllResourcetutorials()
    {
        $resourcetutorial = Resourcetutorial::latest()->get();
        return view('backend.resourcetutorial.all_resourcetutorials', compact('resourcetutorial'));
    }

    // ============================
    // CREATE FORM
    // ============================
    public function AddResourcetutorial()
    {
        return view('backend.resourcetutorial.add_resourcetutorial');
    }

    // ============================
    // STORE
    // ============================
    public function StoreResourcetutorial(Request $request)
    {
        $request->validate([
            'duration' => 'required',
            'title'    => 'required',
            'views'    => 'required',
            'videoUrl'    => 'required|mimes:mp4,mov,avi,wmv|max:51200', // 50MB
        ]);

        // Upload video
        $path = $request->file('videoUrl')->store('resourcetutorials', 'public');

        // Save to DB
        Resourcetutorial::create([
            'duration' => $request->duration,
            'title'    => $request->title,
            'views'    => $request->views,
            'videoUrl'    => $path,
        ]);

        return redirect()->route('all.resourcetutorials')->with([
            'message' => 'Resource Tutorial Uploaded Successfully!',
            'alert-type' => 'success'
        ]);
    }

    // ============================
    // EDIT FORM
    // ============================
    public function EditResourcetutorial(int $id)
    {
        $resourcetutorial = Resourcetutorial::findOrFail($id);
        return view('backend.resourcetutorial.edit_resourcetutorial', compact('resourcetutorial'));
    }

    // ============================
    // UPDATE
    // ============================
    public function UpdateResourcetutorial(Request $request)
    {
        $resourcetutorial = Resourcetutorial::findOrFail($request->id);

        $request->validate([
            'duration' => 'required',
            'title'    => 'required',
            'views'    => 'required',
        ]);

        // If new video uploaded
        if ($request->file('videoUrl')) {

            $request->validate([
                'videoUrl' => 'mimes:mp4,mov,avi,wmv|max:51200',
            ]);

            // Delete old video
            if (Storage::disk('public')->exists($resourcetutorial->videoUrl)) {
                Storage::disk('public')->delete($resourcetutorial->videoUrl);
            }

            // Upload new video
            $path = $request->file('videoUrl')->store('resourcetutorials', 'public');

            $resourcetutorial->update([
                'videoUrl' => $path,
            ]);
        }

        // Update other fields
        $resourcetutorial->update([
            'duration' => $request->duration,
            'title'    => $request->title,
            'views'    => $request->views,
        ]);

        return redirect()->route('all.resourcetutorials')->with([
            'message' => 'Resource Tutorial Updated Successfully!',
            'alert-type' => 'success'
        ]);
    }

    // ============================
    // DELETE
    // ============================
    public function DeleteResourcetutorial(int $id)
    {
        $resourcetutorial = Resourcetutorial::findOrFail(intval($id));

        if (Storage::disk('public')->exists($resourcetutorial->videoUrl)) {
            Storage::disk('public')->delete($resourcetutorial->videoUrl);
        }

        $resourcetutorial->delete();

        return redirect()->back()->with([
            'message' => 'Resource Tutorial Deleted Successfully!',
            'alert-type' => 'success'
        ]);
    }

     // Resourcedetail API
    public function ApiAllResourcetutorials() {
        $resourcetutorial = Resourcetutorial::latest()->get();
        return $resourcetutorial;
    }

}
