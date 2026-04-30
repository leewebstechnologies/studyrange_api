<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Financialfaq;
use Illuminate\Http\Request;

class FinancialfaqController extends Controller
{
    public function AllFinancialfaqs() {
        $financialfaq = Financialfaq::latest()->get();
        return view('backend.financialfaq.all_financialfaqs', compact('financialfaq'));
    }

    public function AddFinancialfaq() {
        return view('backend.financialfaq.add_financialfaq');
    }

    public function StoreFinancialfaq(Request $request) {

        Financialfaq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'FAQ Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.financialfaqs')->with($notification);
    }

    public function EditFinancialfaq($id) {
        $financialfaq = Financialfaq::findOrFail($id);
        return view('backend.financialfaq.edit_financialfaq', compact('financialfaq'));
    }

    public function UpdateFinancialfaq(Request $request) {
        $financialfaq = Financialfaq::findOrFail($request->id);
        $financialfaq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'FAQ Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.financialfaqs')->with($notification);
    }

    public function DeleteFinancialfaq($id) {
        Financialfaq::findOrFail($id)->delete();

        $notification = [
            'message' => 'FAQ Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

     // Financialfaq API
    public function ApiAllFinancialfaqs() {
        $financialfaq = Financialfaq::latest()->get();
        return $financialfaq;
    }

}
