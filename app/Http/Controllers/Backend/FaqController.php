<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function AllFaqs() {
        $faq = Faq::latest()->get();
        return view('backend.faq.all_faqs', compact('faq'));
    }

    public function AddFaq() {
        return view('backend.faq.add_faq');
    }

    public function StoreFaq(Request $request) {

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'FAQ Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.faqs')->with($notification);
    }

    public function EditFaq($id) {
        $faq = Faq::findOrFail($id);
        return view('backend.faq.edit_faq', compact('faq'));
    }

    public function UpdateFaq(Request $request) {
        $faq = Faq::findOrFail($request->id);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'FAQ Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.faqs')->with($notification);
    }

    public function DeleteFaq($id) {
        Faq::findOrFail($id)->delete();

        $notification = [
            'message' => 'FAQ Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
