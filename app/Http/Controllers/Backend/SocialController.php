<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function AllSocials() {
        $social = Social::latest()->get();
        return view('backend.social.all_socials', compact('social'));
    }

    public function AddSocial() {
        return view('backend.social.add_social');
    }

    public function StoreSocial(Request $request) {

        Social::create([
            'facebook' => $request->facebook,
            'x' => $request->x,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);

        $notification = [
            'message' => 'Social Medial Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.socials')->with($notification);
    }

    public function EditSocial($id) {
        $social = Social::findOrFail($id);
        return view('backend.social.edit_social', compact('social'));
    }

    public function UpdateSocial(Request $request) {
        $social = Social::findOrFail($request->id);
        $social->update([
            'facebook' => $request->facebook,
            'x' => $request->x,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);

        $notification = [
            'message' => 'Social Media Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.socials')->with($notification);
    }

    public function DeleteSocial($id) {
        Social::findOrFail($id)->delete();

        $notification = [
            'message' => 'Social Media Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Social API
    public function ApiAllSocials() {
        $social = Social::latest()->get();
        return $social;
    }
}
