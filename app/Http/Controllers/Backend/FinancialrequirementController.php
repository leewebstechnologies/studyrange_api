<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Financialrequirement;
use Illuminate\Http\Request;

class FinancialrequirementController extends Controller
{
    public function AllFinancialrequirements() {
        $financialrequirement = Financialrequirement::latest()->get();
        return view('backend.financialrequirement.all_financialrequirements', compact('financialrequirement'));
    }

    public function AddFinancialrequirement() {
        return view('backend.financialrequirement.add_financialrequirement');
    }

    public function StoreFinancialrequirement(Request $request) {

        Financialrequirement::create([
            'content' => $request->content,
        ]);

            $notification = [
            'message' => 'Financial Requirement Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.financialrequirements')->with($notification);
    }

    public function EditFinancialrequirement($id) {
        $financialrequirement = Financialrequirement::findOrFail($id);
        return view('backend.financialrequirement.edit_financialrequirement', compact('financialrequirement'));
    }

    public function UpdateFinancialrequirement(Request $request) {
        $financialrequirement = Financialrequirement::findOrFail($request->id);
        $financialrequirement->update([
            'content' => $request->content,
        ]);

        $notification = [
            'message' => 'Financial Requirement Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.financialrequirements')->with($notification);
    }

    public function DeleteFinancialrequirement($id) {
        Financialrequirement::findOrFail($id)->delete();

        $notification = [
            'message' => 'Financial Requirement Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

     // Financialrequirement API
    public function ApiAllFinancialrequirements() {
        $financialrequirement = Financialrequirement::latest()->get();
        return $financialrequirement;
    }

}
