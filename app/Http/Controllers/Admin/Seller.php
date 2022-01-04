<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyBid;
use App\Models\User;

class Seller extends Controller
{
    public function sellers(){

        $sellers = User::where('role',2)->with('bids')->get();

        return view('admin.sellers',compact('sellers'));
    }
}
