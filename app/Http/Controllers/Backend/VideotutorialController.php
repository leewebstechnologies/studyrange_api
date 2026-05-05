<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Videotutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideotutorialController extends Controller
{
    // ============================
    // READ ALL
    // ============================
    public function AllVideotutorials()
    {
        $videotutorial = Videotutorial::latest()->get();
        return view('backend.videotutorial.all_videotutorials', compact('videotutorial'));
    }

    // ============================
    // CREATE FORM
    // ============================
    public function AddVideotutorial()
    {
        return view('backend.videotutorial.add_videotutorial');
    }

    // ============================
    // STORE
    // ============================
    public function StoreVideotutorial(Request $request)
    {
        $request->validate([
            'duration' => 'required',
            'title'    => 'required',
            'views'    => 'required',
            'video'    => 'required|mimes:mp4,mov,avi,wmv|max:51200', // 50MB
        ]);

        // Upload video
        $path = $request->file('video')->store('videotutorials', 'public');

        // Save to DB
        Videotutorial::create([
            'duration' => $request->duration,
            'title'    => $request->title,
            'views'    => $request->views,
            'video'    => $path,
        ]);

        return redirect()->route('all.videotutorials')->with([
            'message' => 'Video Tutorial Uploaded Successfully!',
            'alert-type' => 'success'
        ]);
    }

    // ============================
    // EDIT FORM
    // ============================
    public function EditVideotutorial(int $id)
    {
        $videotutorial = Videotutorial::findOrFail($id);
        return view('backend.videotutorial.edit_videotutorial', compact('videotutorial'));
    }

    // ============================
    // UPDATE
    // ============================
    public function UpdateVideotutorial(Request $request)
    {
        $videotutorial = Videotutorial::findOrFail($request->id);

        $request->validate([
            'duration' => 'required',
            'title'    => 'required',
            'views'    => 'required',
        ]);

        // If new video uploaded
        if ($request->file('video')) {

            $request->validate([
                'video' => 'mimes:mp4,mov,avi,wmv|max:51200',
            ]);

            // Delete old video
            if (Storage::disk('public')->exists($videotutorial->video)) {
                Storage::disk('public')->delete($videotutorial->video);
            }

            // Upload new video
            $path = $request->file('video')->store('videotutorials', 'public');

            $videotutorial->update([
                'video' => $path,
            ]);
        }

        // Update other fields
        $videotutorial->update([
            'duration' => $request->duration,
            'title'    => $request->title,
            'views'    => $request->views,
        ]);

        return redirect()->route('all.videotutorials')->with([
            'message' => 'Video Tutorial Updated Successfully!',
            'alert-type' => 'success'
        ]);
    }

    // ============================
    // DELETE
    // ============================
    public function DeleteVideotutorial(int $id)
    {
        $videotutorial = Videotutorial::findOrFail(intval($id));

        if (Storage::disk('public')->exists($videotutorial->video)) {
            Storage::disk('public')->delete($videotutorial->video);
        }

        $videotutorial->delete();

        return redirect()->back()->with([
            'message' => 'Video Tutorial Deleted Successfully!',
            'alert-type' => 'success'
        ]);
    }


    // public function ApiAllVideotutorial()
    // {
    //     return Videotutorial::latest()->get();
    // }
}
