<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

use App\Models\Studymatch;

class StudymatchController extends Controller
{
    public function Studymatch() {
        $studymatch = Studymatch::latest()->get();
        return view('backend.studymatch.all_studymatches', compact('studymatch'));
    }

    public function DeleteStudymatch(int $id) {
        Studymatch::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Study Match Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
