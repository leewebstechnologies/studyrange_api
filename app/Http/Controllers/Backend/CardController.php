<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function AllCards() {
        $card = Card::latest()->get();
        return view('backend.card.all_cards', compact('card'));
    }

    public function AddCard() {
        return view('backend.card.add_card');
    }

    public function StoreCard(Request $request) {

        Card::create([
            'heading' => $request->heading,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $notification = [
            'message' => 'Card Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.cards')->with($notification);
    }

    public function EditCard($id) {
        $card = Card::findOrFail($id);
        return view('backend.card.edit_card', compact('card'));
    }

    public function UpdateCard(Request $request) {
        $card = Card::findOrFail($request->id);
        $card->update([
            'heading' => $request->heading,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $notification = [
            'message' => 'Card Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.cards')->with($notification);
    }

    public function DeleteCard($id) {
        Card::findOrFail($id)->delete();

        $notification = [
            'message' => 'Card Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Card API
    public function ApiAllCards() {
        $card = Card::latest()->get();
        return $card;
    }

}
