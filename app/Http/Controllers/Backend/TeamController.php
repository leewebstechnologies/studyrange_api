<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TeamController extends Controller
{
     public function AllTeams() {
        $team = Team::latest()->get();
        return view('backend.team.all_teams', compact('team'));
    }
    // End Method

    public function AddTeam() {
        return view('backend.team.add_team');
    }
    // End Method

    public function StoreTeam(Request $request) {
         if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/team/'.$name_gen));
            $save_url = 'upload/team/'.$name_gen;

            Team::create([
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Team Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.teams')->with($notification);

    }
    // End Method

    public function EditTeam($id) {
        $team = Team::find($id);
        return view('backend.team.edit_team', compact('team'));
    }
    // End Method

    public function UpdateTeam(Request $request) {
        $team_id = $request->id;
        $team = Team::findOrFail($team_id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1124, 750)->save(public_path('upload/team/'.$name_gen));
            $save_url = 'upload/team/'.$name_gen;

            // delete old image safely
            if ($team->image && file_exists(public_path($team->image))) {
                unlink(public_path($team->image));
            }

            $team->update([
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'image' => $save_url,
            ]);

            $notification = [
                'message' => 'Team Updated With Image Successfully!',
                'alert-type' => 'success'
            ];

        } else {

            $team->update([
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
            ]);

            $notification = [
                'message' => 'Team Updated Without Image Successfully!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->route('all.teams')->with($notification);
    }
    // End Method

    public function DeleteTeam($id) {
        $item = Team::find($id);
        $img = $item->image;
        unlink($img);

        Team::find($id)->delete();

         $notification = array(
            'message' => 'Team Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

}
