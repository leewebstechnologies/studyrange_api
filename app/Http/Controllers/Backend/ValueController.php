<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Value;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function AllValues() {
        $value = Value::latest()->get();
        return view('backend.value.all_values', compact('value'));
    }

    public function AddValue() {
        return view('backend.value.add_value');
    }

    public function StoreValue(Request $request) {

        Value::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'message' => 'Value Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.values')->with($notification);
    }

    public function EditValue($id) {
        $value = Value::findOrFail($id);
        return view('backend.value.edit_value', compact('value'));
    }

    public function UpdateValue(Request $request) {
        $value = Value::findOrFail($request->id);
        $value->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'message' => 'Value Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.values')->with($notification);
    }

    public function DeleteValue($id) {
        Value::findOrFail($id)->delete();

        $notification = [
            'message' => 'Value Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
