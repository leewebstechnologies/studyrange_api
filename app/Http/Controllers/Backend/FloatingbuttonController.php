<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Floatingbutton;
use Illuminate\Http\Request;

class FloatingbuttonController extends Controller
{
    public function AllFloatingbuttons() {
        $floatingbutton = Floatingbutton::latest()->get();
        return view('backend.floatingbutton.all_floatingbuttons', compact('floatingbutton'));
    }

    public function AddFloatingbutton() {
        return view('backend.floatingbutton.add_floatingbutton');
    }

    public function StoreFloatingbutton(Request $request) {

        Floatingbutton::create([
            'whatsapp' => $request->whatsapp,
        ]);

        $notification = [
            'message' => 'Floating Button Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.floatingbuttons')->with($notification);
    }

    public function EditFloatingbutton(int $id) {
        $floatingbutton = Floatingbutton::findOrFail($id);
        return view('backend.floatingbutton.edit_floatingbutton', compact('floatingbutton'));
    }

    public function UpdateFloatingbutton(Request $request) {
        $floatingbutton = Floatingbutton::findOrFail($request->id);
        $floatingbutton->update([
            'whatsapp' => $request->whatsapp,
        ]);

        $notification = [
            'message' => 'Floating Button Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.floatingbuttons')->with($notification);
    }

    public function DeleteFloatingbutton(int $id) {
        Floatingbutton::findOrFail($id)->delete();

        $notification = [
            'message' => 'Floating Button Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

     // Floating Button API
    public function ApiAllFloatingbuttons() {
        $floatingbutton = Floatingbutton::latest()->get();
        return $floatingbutton;
    }

}
