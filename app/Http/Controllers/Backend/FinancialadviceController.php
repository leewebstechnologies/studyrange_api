<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Financialadvice;
use Illuminate\Http\Request;

class FinancialadviceController extends Controller
{
    public function AllFinancialadvice() {
        $financialadvice = Financialadvice::latest()->get();
        return view('backend.financialadvice.all_financialadvice', compact('financialadvice'));
    }

    public function AddFinancialadvice() {
        return view('backend.financialadvice.add_financialadvice');
    }

    public function StoreFinancialadvice(Request $request) {

        Financialadvice::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

            $notification = [
            'message' => 'Financial Advice Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.financialadvice')->with($notification);
    }

    public function EditFinancialadvice($id) {
        $financialadvice = Financialadvice::findOrFail($id);
        return view('backend.financialadvice.edit_financialadvice', compact('financialadvice'));
    }

    public function UpdateFinancialadvice(Request $request) {
        $financialadvice = Financialadvice::findOrFail($request->id);
        $financialadvice->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'message' => 'Financial Advice Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.financialadvice')->with($notification);
    }

    public function DeleteFinancialadvice($id) {
        Financialadvice::findOrFail($id)->delete();

        $notification = [
            'message' => 'Financial Advice Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Financialadvice API
    public function ApiAllFinancialadvice() {
        $financialadvice = Financialadvice::latest()->get();
        return $financialadvice;
    }

}
