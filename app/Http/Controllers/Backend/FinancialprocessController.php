<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Financialprocess;
use Illuminate\Http\Request;

class FinancialprocessController extends Controller
{
    public function AllFinancialprocesses() {
        $financialprocess = Financialprocess::latest()->get();
        return view('backend.financialprocess.all_financialprocesses', compact('financialprocess'));
    }

    public function AddFinancialprocess() {
        return view('backend.financialprocess.add_financialprocess');
    }

    public function StoreFinancialprocess(Request $request) {

        Financialprocess::create([
            'heading' => $request->heading,
            'content' => $request->content,
        ]);

            $notification = [
            'message' => 'Financial Process Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.financialprocesses')->with($notification);
    }

    public function EditFinancialprocess($id) {
        $financialprocess = Financialprocess::findOrFail($id);
        return view('backend.financialprocess.edit_financialprocess', compact('financialprocess'));
    }

    public function UpdateFinancialprocess(Request $request) {
        $financialprocess = Financialprocess::findOrFail($request->id);
        $financialprocess->update([
            'heading' => $request->heading,
            'content' => $request->content,
        ]);

        $notification = [
            'message' => 'Financial Process Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.financialprocesses')->with($notification);
    }

    public function DeleteFinancialprocess($id) {
        Financialprocess::findOrFail($id)->delete();

        $notification = [
            'message' => 'Financial Process Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Financialprocess API
    public function ApiAllFinancialprocesses() {
        $financialprocess = Financialprocess::latest()->get();
        return $financialprocess;
    }

}
