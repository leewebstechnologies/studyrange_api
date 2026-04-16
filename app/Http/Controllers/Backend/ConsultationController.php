<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function AllConsultations() {
        $consultation = Consultation::latest()->get();
        return view('backend.consultation.all_consultations', compact('consultation'));
    }

    public function AddConsultation() {
        return view('backend.consultation.add_consultation');
    }

    public function StoreConsultation(Request $request) {

        Consultation::create([
            'text' => $request->text,
            'phone' => $request->phone,
            'link' => $request->link,
        ]);

        $notification = [
            'message' => 'Consultation Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.consultations')->with($notification);
    }

    public function EditConsultation($id) {
        $consultation = Consultation::findOrFail($id);
        return view('backend.consultation.edit_consultation', compact('consultation'));
    }

    public function UpdateConsultation(Request $request) {
        $consultation = Consultation::findOrFail($request->id);
        $consultation->update([
            'text' => $request->text,
            'phone' => $request->phone,
            'link' => $request->link,
        ]);

        $notification = [
            'message' => 'Consultation Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.consultations')->with($notification);
    }

    public function DeleteConsultation($id) {
        Consultation::findOrFail($id)->delete();

        $notification = [
            'message' => 'Consultation Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Consultation API
    public function ApiAllConsultations() {
        $consultation = Consultation::latest()->get();
        return $consultation;
    }
}
