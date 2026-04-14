<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function AllCargoes() {
        $cargo = Cargo::latest()->get();
        return view('backend.cargo.all_cargoes', compact('cargo'));
    }

    public function AddCargo() {
        return view('backend.cargo.add_cargo');
    }

    public function StoreCargo(Request $request) {

        Cargo::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'message' => 'Cargo Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.cargoes')->with($notification);
    }

    public function EditCargo($id) {
        $cargo = Cargo::findOrFail($id);
        return view('backend.cargo.edit_cargo', compact('cargo'));
    }

    public function UpdateCargo(Request $request) {
        $cargo = Cargo::findOrFail($request->id);
        $cargo->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'message' => 'Cargo Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.cargoes')->with($notification);
    }

    public function DeleteCargo($id) {
        Cargo::findOrFail($id)->delete();

        $notification = [
            'message' => 'Cargo Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Cargo API
    public function ApiAllCargoes() {
        $cargo = Cargo::latest()->get();
        return $cargo;
    }
}
