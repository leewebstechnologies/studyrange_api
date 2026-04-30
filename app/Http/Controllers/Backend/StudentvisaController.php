<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Studentvisa;
use Illuminate\Http\Request;

class StudentvisaController extends Controller
{
    public function AllStudentvisas() {
        $studentvisa = Studentvisa::latest()->get();
        return view('backend.studentvisa.all_studentvisas', compact('studentvisa'));
    }

    public function AddStudentvisa() {
        return view('backend.studentvisa.add_studentvisa');
    }

    public function StoreStudentvisa(Request $request) {

        Studentvisa::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

            $notification = [
            'message' => 'Student Visa Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.studentvisas')->with($notification);
    }

    public function EditStudentvisa($id) {
        $studentvisa = Studentvisa::findOrFail($id);
        return view('backend.studentvisa.edit_studentvisa', compact('studentvisa'));
    }

    public function UpdateStudentvisa(Request $request) {
        $studentvisa = Studentvisa::findOrFail($request->id);
        $studentvisa->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'message' => 'Student Visa Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.studentvisas')->with($notification);
    }

    public function DeleteStudentvisa($id) {
        Studentvisa::findOrFail($id)->delete();

        $notification = [
            'message' => 'Student Visa Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

     // Student Visa API
    public function ApiAllStudentvisas() {
        $studentvisa = Studentvisa::latest()->get();
        return $studentvisa;
    }

}
