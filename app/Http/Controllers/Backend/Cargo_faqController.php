<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cargo_faq;
use Illuminate\Http\Request;

class Cargo_faqController extends Controller
{
    public function AllCargoFaqs() {
        $cargo_faq = Cargo_faq::latest()->get();
        return view('backend.cargo-faq.all_cargo_faqs', compact('cargo_faq'));
    }

    public function AddCargoFaq() {
        return view('backend.cargo-faq.add_cargo_faq');
    }

    public function StoreCargoFaq(Request $request) {

        Cargo_faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'Cargo FAQ Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.cargo_faqs')->with($notification);
    }

    public function EditCargoFaq($id) {
        $cargo_faq = Cargo_faq::findOrFail($id);
        return view('backend.cargo-faq.edit_cargo_faq', compact('cargo_faq'));
    }

    public function UpdateCargoFaq(Request $request) {
        $cargo_faq = Cargo_faq::findOrFail($request->id);
        $cargo_faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'Cargo FAQ Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.cargo_faqs')->with($notification);
    }

    public function DeleteCargoFaq($id) {
        Cargo_faq::findOrFail($id)->delete();

        $notification = [
            'message' => 'Cargo FAQ Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Cargo_faq API
    public function ApiAllCargoFaqs() {
        $cargo_faq = Cargo_faq::latest()->get();
        return $cargo_faq;
    }
}
