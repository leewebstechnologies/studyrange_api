<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About_rating;
use Illuminate\Http\Request;

class About_ratingController extends Controller
{
    public function AllAbout_ratings() {
        $about_rating = About_rating::latest()->get();
        return view('backend.about_rating.all_about_ratings', compact('about_rating'));
    }

    public function AddAbout_rating() {
        return view('backend.about_rating.add_about_rating');
    }

    public function StoreAbout_rating(Request $request) {

        About_rating::create([
            'rating' => $request->rating,
            'description' => $request->description,
            'phone' => $request->phone,
        ]);

        $notification = [
            'message' => 'About Rating Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.about_ratings')->with($notification);
    }

    public function EditAbout_rating(int $id) {
        $about_rating = About_rating::findOrFail($id);
        return view('backend.about_rating.edit_about_rating', compact('about_rating'));
    }

    public function UpdateAbout_rating(Request $request) {
        $about_rating = About_rating::findOrFail($request->id);
        $about_rating->update([
            'rating' => $request->rating,
            'description' => $request->description,
            'phone' => $request->phone,
        ]);

        $notification = [
            'message' => 'About Rating Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.about_ratings')->with($notification);
    }

    public function DeleteAbout_rating(int $id) {
        About_rating::findOrFail($id)->delete();

        $notification = [
            'message' => 'About Rating Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // About_rating API
    public function ApiAllAboutRatings() {
        $about_rating = About_rating::latest()->get();
        return $about_rating;
    }

}
