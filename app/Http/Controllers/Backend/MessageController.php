<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
// use Illuminate\Http\Request;

class MessageController extends Controller
{
     public function Message() {
        $message = Message::latest()->get();
        return view('backend.message.all_messages', compact('message'));
    }

    // Message API
    // public function ApiMessage(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'subject' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'message' => 'required|string',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     Contact::create($request->all());
    //     return response()->json(['message' => 'Contact sent successfully'], 201);
    // }

}
