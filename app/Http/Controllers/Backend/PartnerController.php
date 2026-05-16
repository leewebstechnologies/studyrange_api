<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PartnerController extends Controller
{
    public function AllPartners() {
        $partner = Partner::latest()->get();
        return view('backend.partner.all_partners', compact('partner'));
    }
    // End Method

    public function AddPartner() {
        return view('backend.partner.add_partner');
    }
    // End Method

    public function StorePartner(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/partner/'.$name_gen));
            $save_url = 'upload/partner/'.$name_gen;

            Partner::create([
                'name' => $request->name,
                'rank' => $request->rank,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Partner Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.partners')->with($notification);

    }
    // End Method

    public function EditPartner(int $id) {
        $partner = Partner::find($id);
        return view('backend.partner.edit_partner', compact('partner'));
    }
    // End Method

    public function UpdatePartner(Request $request) {
        $partner_id = $request->id;
        $partner = Partner::findOrFail($partner_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/partner/'.$name_gen));
            $save_url = 'upload/partner/'.$name_gen;

            // delete old image safely
            if ($partner->image && file_exists(public_path($partner->image))) {
                unlink(public_path($partner->image));
            }

            $partner->update([
                'name' => $request->name,
                'rank' => $request->rank,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'Partner Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $partner->update([
                'name' => $request->name,
                'rank' => $request->rank,
            ]);

            $notification = [
                'message' => 'Partner Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.partners')->with($notification);
    }
    // End Method

    public function DeletePartner(int $id) {
        $item = Partner::find($id);
        $img = $item->image;
        unlink($img);

        Partner::find($id)->delete();

         $notification = array(
            'message' => 'Partner Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

    // Partner API
    public function ApiAllPartners() {
        $partner = Partner::latest()->get();
        return $partner;
    }

}
