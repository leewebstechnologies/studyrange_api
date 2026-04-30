<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
     public function AllPartners() {
        $partner = Partner::latest()->get();
        return view('backend.partner.all_partners', compact('partner'));
    }

    public function AddPartner() {
        return view('backend.partner.add_partner');
    }

    public function StorePartner(Request $request) {

        Partner::create([
            'name' => $request->name,
            'rank' => $request->rank,
        ]);

        $notification = [
            'message' => 'University Partner Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.partners')->with($notification);
    }

    public function EditPartner(int $id) {
        $partner = Partner::findOrFail($id);
        return view('backend.partner.edit_partner', compact('partner'));
    }

    public function UpdatePartner(Request $request) {
        $partner = Partner::findOrFail($request->id);
        $partner->update([
            'name' => $request->name,
            'rank' => $request->rank,
        ]);

        $notification = [
            'message' => 'University Partner Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.partners')->with($notification);
    }

    public function DeletePartner(int $id) {
        Partner::findOrFail($id)->delete();

        $notification = [
            'message' => 'University Partner Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Partner API
    public function ApiAllPartners() {
        $partner = Partner::latest()->get();
        return $partner;
    }

}
