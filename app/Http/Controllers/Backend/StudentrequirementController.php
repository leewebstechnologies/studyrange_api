<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Studentrequirement;
use Illuminate\Http\Request;

class StudentrequirementController extends Controller
{
    public function AllStudentrequirements() {
        $studentrequirement = Studentrequirement::latest()->get();
        return view('backend.studentrequirement.all_studentrequirements', compact('studentrequirement'));
    }

    public function AddStudentrequirement() {
        return view('backend.studentrequirement.add_studentrequirement');
    }

    public function StoreStudentrequirement(Request $request) {

        Studentrequirement::create([
            'content' => $request->content,
        ]);

            $notification = [
            'message' => 'Student Requirement Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.studentrequirements')->with($notification);
    }

    public function EditStudentrequirement($id) {
        $studentrequirement = Studentrequirement::findOrFail($id);
        return view('backend.studentrequirement.edit_studentrequirement', compact('studentrequirement'));
    }

    public function UpdateStudentrequirement(Request $request) {
        $studentrequirement = Studentrequirement::findOrFail($request->id);
        $studentrequirement->update([
            'content' => $request->content,
        ]);

        $notification = [
            'message' => 'Student Requirement Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.studentrequirements')->with($notification);
    }

    public function DeleteStudentrequirement($id) {
        Studentrequirement::findOrFail($id)->delete();

        $notification = [
            'message' => 'Student Requirement Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

     // Student Requirement API
    public function ApiAllStudentrequirements() {
        $studentrequirement = Studentrequirement::latest()->get();
        return $studentrequirement;
    }

}
