<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function AllFooters() {
        $footer = Footer::latest()->get();
        return view('backend.footer.all_footers', compact('footer'));
    }

    public function AddFooter() {
        return view('backend.footer.add_footer');
    }

    public function StoreFooter(Request $request) {

        Footer::create([
            'text' => $request->text,
            'phone_one' => $request->phone_one,
            'phone_two' => $request->phone_two,
            'email' => $request->email,
        ]);

        $notification = [
            'message' => 'Footer Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.footers')->with($notification);
    }

    public function EditFooter($id) {
        $footer = Footer::findOrFail($id);
        return view('backend.footer.edit_footer', compact('footer'));
    }

    public function UpdateFooter(Request $request) {
        $footer = Footer::findOrFail($request->id);
        $footer->update([
            'text' => $request->text,
            'phone_one' => $request->phone_one,
            'phone_two' => $request->phone_two,
            'email' => $request->email,
        ]);

        $notification = [
            'message' => 'Footer Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.footers')->with($notification);
    }

    public function DeleteFooter($id) {
        Footer::findOrFail($id)->delete();

        $notification = [
            'message' => 'Footer Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Footer API
    public function ApiAllFooters() {
        $footer = Footer::latest()->get();
        return $footer;
    }
}
