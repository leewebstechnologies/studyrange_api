<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Statement;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function AllStatements() {
        $statement = Statement::latest()->get();
        return view('backend.statement.all_statements', compact('statement'));
    }

    public function AddStatement() {
        return view('backend.statement.add_statement');
    }

    public function StoreStatement(Request $request) {

        Statement::create([
            'mission' => $request->mission,
            'vision' => $request->vision,
        ]);

        $notification = [
            'message' => 'Statement Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.statements')->with($notification);
    }

    public function EditStatement($id) {
        $statement = Statement::findOrFail($id);
        return view('backend.statement.edit_statement', compact('statement'));
    }

    public function UpdateStatement(Request $request) {
        $statement = Statement::findOrFail($request->id);
        $statement->update([
            'mission' => $request->mission,
            'vision' => $request->vision,
        ]);

        $notification = [
            'message' => 'Statement Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.statements')->with($notification);
    }

    public function DeleteStatement($id) {
        Statement::findOrFail($id)->delete();

        $notification = [
            'message' => 'Statement Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
