<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function Message() {
        $message = Message::latest()->get();
        return view('backend.message.all_messages', compact('message'));
    }

    // Message API
    public function ApiMessage(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Message::create($request->all());
        return response()->json(['message' => 'Message sent successfully'], 201);
    }

    public function DeleteMessage(int $id) {
        Message::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
