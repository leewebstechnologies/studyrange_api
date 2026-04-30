<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Financialtimeline;
use Illuminate\Http\Request;

class FinancialtimelineController extends Controller
{
    public function AllFinancialtimelines() {
        $financialtimeline = Financialtimeline::latest()->get();
        return view('backend.financialtimeline.all_financialtimelines', compact('financialtimeline'));
    }

    public function AddFinancialtimeline() {
        return view('backend.financialtimeline.add_financialtimeline');
    }

    public function StoreFinancialtimeline(Request $request) {

        Financialtimeline::create([
            'content' => $request->content,
        ]);

            $notification = [
            'message' => 'Financial Timeline Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.financialtimelines')->with($notification);
    }

    public function EditFinancialtimeline($id) {
        $financialtimeline = Financialtimeline::findOrFail($id);
        return view('backend.financialtimeline.edit_financialtimeline', compact('financialtimeline'));
    }

    public function UpdateFinancialtimeline(Request $request) {
        $financialtimeline = Financialtimeline::findOrFail($request->id);
        $financialtimeline->update([
            'content' => $request->content,
        ]);

        $notification = [
            'message' => 'Financial Timeline Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.financialtimelines')->with($notification);
    }

    public function DeleteFinancialtimeline($id) {
        Financialtimeline::findOrFail($id)->delete();

        $notification = [
            'message' => 'Financial Timeline Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

     // Financialtimeline API
    public function ApiAllFinancialtimelines() {
        $financialtimeline = Financialtimeline::latest()->get();
        return $financialtimeline;
    }

}
