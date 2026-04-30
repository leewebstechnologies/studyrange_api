<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Studenttimeline;
use Illuminate\Http\Request;

class StudenttimelineController extends Controller
{
    public function AllStudenttimelines() {
        $studenttimeline = Studenttimeline::latest()->get();
        return view('backend.studenttimeline.all_studenttimelines', compact('studenttimeline'));
    }

    public function AddStudenttimeline() {
        return view('backend.studenttimeline.add_studenttimeline');
    }

    public function StoreStudenttimeline(Request $request) {

        Studenttimeline::create([
            'content' => $request->content,
        ]);

            $notification = [
            'message' => 'Student Timeline Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.studenttimelines')->with($notification);
    }

    public function EditStudenttimeline($id) {
        $studenttimeline = Studenttimeline::findOrFail($id);
        return view('backend.studenttimeline.edit_studenttimeline', compact('studenttimeline'));
    }

    public function UpdateStudenttimeline(Request $request) {
        $studenttimeline = Studenttimeline::findOrFail($request->id);
        $studenttimeline->update([
            'content' => $request->content,
        ]);

        $notification = [
            'message' => 'Student Timeline Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.studenttimelines')->with($notification);
    }

    public function DeleteStudenttimeline($id) {
        Studenttimeline::findOrFail($id)->delete();

        $notification = [
            'message' => 'Student Timeline Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

     // Student Timeline API
    public function ApiAllStudenttimelines() {
        $studenttimeline = Studenttimeline::latest()->get();
        return $studenttimeline;
    }

}
