<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class HeroController extends Controller
{
    public function AllHeroes() {
        $hero = Hero::latest()->get();
        return view('backend.hero.all_heroes', compact('hero'));
    }
    // End Method

    public function AddHero() {
        return view('backend.hero.add_hero');
    }
    // End Method

    public function StoreHero(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/hero/'.$name_gen));
            $save_url = 'upload/hero/'.$name_gen;

            Hero::create([
                'client' => $request->client,
                'rating' => $request->rating,
                'phone' => $request->phone,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Hero Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.heroes')->with($notification);

    }
    // End Method
}
