<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Sale;
use App\Models\Member;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function order()
    {
        $items = Item::all();
        $sale = session()->get('sale', new Sale());
        // $sale = Sale::all();

        // dd(($sale && $sale->items && count($sale->items) > 0));
        return view('orders.order', compact('items', 'sale'));

    }

    public function addItem(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|numeric|min:1'
        ]);
    
        $item = Item::findOrFail($request->item_id);
    
        // Get the sale from session or create a new one if it doesn't exist
        $sale = session()->get('sale', new Sale());
    
        // If the sale doesn't have an ID (i.e., it's not saved to the database yet), save it
        if (!$sale->id) {
            $sale->save();
        }
    
        // Attach the item to the sale and specify the quantity
        $sale->items()->attach($item->id, ['quantity' => $request->quantity]);
    
        // Update the session with the modified sale
        session()->put('sale', $sale);
    
        return redirect()->back()->with('success', 'Sale line item added successfully.');
    }
    

    public function destroy($itemId)
    {
        $sale = session()->get('sale', new Sale());
        $sale->items()->detach($itemId);
        session()->put('sale', $sale);
        return redirect()->route('orders.index')->with('success', 'Sale line item removed successfully.');
    }

    public function pay()
    {
        $sale = session()->get('sale');

        // Calculate total amount
        $totalAmount = 0;
        foreach ($sale->items as $item) {
            $totalAmount += $item->price * $item->pivot->quantity;
        }

        // Check if the user is a member and apply discount if applicable
        $isMember = false; // Replace this with your logic to check if the user is a member
        if ($isMember) {
            $totalAmount *= 0.9; // Apply 10% discount for members
        }

        return view('orders.pay', compact('totalAmount'));
    }

    public function checkMember(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
    
        $email = $request->input('email');
        $sale = session()->get('sale');
    
        // Calculate total amount
        $totalAmount = 0;
        foreach ($sale->items as $item) {
            $totalAmount += $item->price * $item->pivot->quantity;
        }
    
        $member = Member::where('email', $email)->first();
    
        if ($member) {
            // Member found, apply 10% discount
            $discount = $this->calculateDiscount($totalAmount);
            $totalAmount -= $discount;
            session()->put('discount', $discount);
            session()->put('member_id', $member->id);
        } else {
            // Member not found, proceed without discount
            session()->forget('discount');
            session()->forget('member_id');
        }
    
        // Redirect back to payment page with updated total amount
        return redirect()->route('orders.pay')->with('totalAmount', $totalAmount);
    }
    
    
    private function calculateDiscount($totalAmount)
    {
        // Calculate 10% discount
        return $totalAmount * 0.1;
    }
}
