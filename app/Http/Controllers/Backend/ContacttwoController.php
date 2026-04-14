<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contacttwo;
use Illuminate\Http\Request;

class ContacttwoController extends Controller
{
    public function AllContacttwo() {
        $contacttwo = Contacttwo::latest()->get();
        return view('backend.contacttwo.all_contacttwo', compact('contacttwo'));
    }

    public function AddContacttwo() {
        return view('backend.contacttwo.add_contacttwo');
    }

    public function StoreContacttwo(Request $request) {

        Contacttwo::create([
            'office' => $request->office,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'hours' => $request->hours,
        ]);

        $notification = [
            'message' => 'Contact Two Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.contacttwo')->with($notification);
    }

    public function EditContacttwo($id) {
        $contacttwo = Contacttwo::findOrFail($id);
        return view('backend.contacttwo.edit_contacttwo', compact('contacttwo'));
    }

    public function UpdateContacttwo(Request $request) {
        $contacttwo = Contacttwo::findOrFail($request->id);
        $contacttwo->update([
            'office' => $request->office,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'hours' => $request->hours,
        ]);

        $notification = [
            'message' => 'Contact Two Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.contacttwo')->with($notification);
    }

    public function DeleteLive($id) {
        Contacttwo::findOrFail($id)->delete();

        $notification = [
            'message' => 'Contact Two Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Contacttwo API
    public function ApiAllContacttwo() {
        $contacttwo = Contacttwo::latest()->get();
        return $contacttwo;
    }
}
