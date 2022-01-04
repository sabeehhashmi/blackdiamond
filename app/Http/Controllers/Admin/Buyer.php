<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyBid;
use App\Models\User;

class Buyer extends Controller
{
    public function buyers(){

        $buyers = User::where('role',3)->with('bids')->get();

        return view('admin.buyers',compact('buyers'));
    }
    public function buyerBids($id){

        $buyer_bids = PropertyBid::where('user_id',$id)->get();

        return view('admin.buyer-bids',compact('buyer_bids'));
    }
    public function buyerDetail($id){

        $user = User::find($id);

        return view('admin.buyer-detail',compact('user'));
    }
}
