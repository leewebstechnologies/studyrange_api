<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Studentfaq;
use Illuminate\Http\Request;

class StudentfaqController extends Controller
{
    public function AllStudentfaqs() {
        $studentfaq = Studentfaq::latest()->get();
        return view('backend.studentfaq.all_studentfaqs', compact('studentfaq'));
    }

    public function AddStudentfaq() {
        return view('backend.studentfaq.add_studentfaq');
    }

    public function StoreStudentfaq(Request $request) {

        Studentfaq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'FAQ Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.studentfaqs')->with($notification);
    }

    public function EditStudentfaq($id) {
        $studentfaq = Studentfaq::findOrFail($id);
        return view('backend.studentfaq.edit_studentfaq', compact('studentfaq'));
    }

    public function UpdateStudentfaq(Request $request) {
        $studentfaq = Studentfaq::findOrFail($request->id);
        $studentfaq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'FAQ Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.studentfaqs')->with($notification);
    }

    public function DeleteStudentfaq($id) {
        Studentfaq::findOrFail($id)->delete();

        $notification = [
            'message' => 'FAQ Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

     // Student FAQ API
    public function ApiAllStudentfaqs() {
        $studentfaq = Studentfaq::latest()->get();
        return $studentfaq;
    }

}
