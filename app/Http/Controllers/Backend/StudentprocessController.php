<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Studentprocess;
use Illuminate\Http\Request;

class StudentprocessController extends Controller
{
    public function AllStudentprocesses() {
        $studentprocess = Studentprocess::latest()->get();
        return view('backend.studentprocess.all_studentprocesses', compact('studentprocess'));
    }

    public function AddStudentprocess() {
        return view('backend.studentprocess.add_studentprocess');
    }

    public function StoreStudentprocess(Request $request) {

        Studentprocess::create([
            'heading' => $request->heading,
            'content' => $request->content,
        ]);

            $notification = [
            'message' => 'Student Process Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.studentprocesses')->with($notification);
    }

    public function EditStudentprocess($id) {
        $studentprocess = Studentprocess::findOrFail($id);
        return view('backend.studentprocess.edit_studentprocess', compact('studentprocess'));
    }

    public function UpdateStudentprocess(Request $request) {
        $studentprocess = Studentprocess::findOrFail($request->id);
        $studentprocess->update([
            'heading' => $request->heading,
            'content' => $request->content,
        ]);

        $notification = [
            'message' => 'Student Process Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.studentprocesses')->with($notification);
    }

    public function DeleteStudentprocess($id) {
        Studentprocess::findOrFail($id)->delete();

        $notification = [
            'message' => 'Student Process Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Student Process API
    public function ApiAllStudentprocesses() {
        $studentprocess = Studentprocess::latest()->get();
        return $studentprocess;
    }

}
