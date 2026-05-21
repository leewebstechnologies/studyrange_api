<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function AllGuides() {
        $guide = Guide::latest()->get();
        return view('backend.guide.all_guides', compact('guide'));
    }
    // End Method


    public function AddGuide() {
        return view('backend.guide.add_guide');
    }
    // End Method


    public function StoreGuide(Request $request) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'pages' => 'required',
            'downloads' => 'required|mimes:pdf|max:20480',
        ]);

        $save_url = null;

        if ($request->file('downloads')) {

            $file = $request->file('downloads');

            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('upload/guide/'), $name_gen);

            $save_url = 'upload/guide/' . $name_gen;
        }

        Guide::create([
            'title' => $request->title,
            'description' => $request->description,
            'pages' => $request->pages,
            'downloads' => $save_url,
        ]);

        $notification = array(
            'message' => 'Guide Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.guides')->with($notification);
    }
    // End Method


    public function EditGuide(int $id) {
        $guide = Guide::findOrFail($id);
        return view('backend.guide.edit_guide', compact('guide'));
    }
    // End Method


    public function UpdateGuide(Request $request) {

        $guide_id = $request->id;

        $guide = Guide::findOrFail($guide_id);

        if ($request->file('downloads')) {

            $request->validate([
                'downloads' => 'mimes:pdf|max:20480',
            ]);

            $file = $request->file('downloads');

            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('upload/guide/'), $name_gen);

            $save_url = 'upload/guide/' . $name_gen;

            // Delete old PDF
            if ($guide->downloads && file_exists(public_path($guide->downloads))) {
                unlink(public_path($guide->downloads));
            }

            $guide->update([
                'title' => $request->title,
                'description' => $request->description,
                'pages' => $request->pages,
                'downloads' => $save_url,
            ]);

            $notification = [
                'message' => 'Guide Updated With PDF Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $guide->update([
                'title' => $request->title,
                'description' => $request->description,
                'pages' => $request->pages,
            ]);

            $notification = [
                'message' => 'Guide Updated Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.guides')->with($notification);
    }
    // End Method


    public function DeleteGuide(int $id) {

        $item = Guide::findOrFail($id);

        // Delete PDF file
        if ($item->downloads && file_exists(public_path($item->downloads))) {
            unlink(public_path($item->downloads));
        }

        $item->delete();

        $notification = array(
            'message' => 'Guide Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

    // Guide API
    public function ApiAllGuides() {
        $guide = Guide::latest()->get();
        return $guide;
    }
}