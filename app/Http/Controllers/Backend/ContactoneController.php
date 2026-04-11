<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contactone;
use Illuminate\Http\Request;

class ContactoneController extends Controller
{
    public function AllContactone() {
        $contactone = Contactone::latest()->get();
        return view('backend.contactone.all_contactone', compact('contactone'));
    }

    public function AddContactone() {
        return view('backend.contactone.add_contactone');
    }

    public function StoreContactone(Request $request) {

        Contactone::create([
            'call' => $request->call,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'hours' => $request->hours,
        ]);

        $notification = [
            'message' => 'Contact One Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.contactone')->with($notification);
    }

    public function EditContactone($id) {
        $contactone = Contactone::findOrFail($id);
        return view('backend.contactone.edit_contactone', compact('contactone'));
    }

    public function UpdateContactone(Request $request) {
        $contactone = Contactone::findOrFail($request->id);
        $contactone->update([
            'call' => $request->call,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'hours' => $request->hours,
        ]);

        $notification = [
            'message' => 'Contact One Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.contactone')->with($notification);
    }

    public function DeleteLive($id) {
        Contactone::findOrFail($id)->delete();

        $notification = [
            'message' => 'Contact One Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
    
}
