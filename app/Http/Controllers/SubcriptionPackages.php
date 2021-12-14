<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubcriptionPackage;
use Cartalyst\Stripe\Stripe;

class SubcriptionPackages extends Controller
{
    public function savePackage(Request $request){
        $stripe = new Stripe(env('STRIPE_API_KEY'), env('STRIPE_API_VERSION'));
        $package =SubcriptionPackage::find($request->input("id"));
        $product = $stripe->products()->create([
          'name' => $request->input("name"),
          'description' =>' Subscription for ('.$request->input("bids"). ') bids',
      ]);
        $amount = $request->input("price")/100;
        $new_plan = $stripe->plans()->create([
          'amount' => $amount,
          'currency' => 'usd',
          'interval' => $request->input("cycle"),
          'product' => $product['id'],
      ]);

        $package =(!empty($package))?$package:new SubcriptionPackage();
        $package->name = $request->input("name");
        $package->bids = $request->input("bids");
        $package->subscription_id = $new_plan['id'];
        $package->price = $request->input("price");
        $package->cycle =$request->input("cycle");
        $package->save();
        return redirect('/admin/packages');
    }
    public function allPackages(){
        $packages =SubcriptionPackage::all();

        return view('admin.packages',compact('packages'));
    }

    public function deletePackage($id)
    {

      $package = SubcriptionPackage::find($id);

      if($package){
        $package->delete();
    }

    return redirect('/admin/packages');
}

public function package($id='')
{
    if($id){
      $package =SubcriptionPackage::find($id);
  }
  else{
    $package = '';
}
return view('admin.addpackage',compact('package'));
}
}
