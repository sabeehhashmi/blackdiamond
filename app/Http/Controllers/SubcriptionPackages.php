<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubcriptionPackage;
use App\Models\User;
use Cartalyst\Stripe\Stripe;
use App\Models\UserBid;

class SubcriptionPackages extends Controller
{
  public function savePackage(Request $request){

    $stripe = new Stripe(get_option('STRIPE_API_KEY'), get_option('STRIPE_API_VERSION'));
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
  public function subscribeCustomerToPlan(Request $request){
    /*Create customer*/
    $user=User::find($request->user_id);
    if($user){

      $email = $user->email;
      $token = $request->token;

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$email."&source=".$token);
      curl_setopt($ch, CURLOPT_USERPWD, get_option('STRIPE_API_KEY') . ':' . '');

      $headers = array();
      $headers[] = 'Content-Type: application/x-www-form-urlencoded';
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $result = curl_exec($ch);
      if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
      }
      curl_close($ch);
      
      $result = json_decode($result);
      $customer = $result->id;

      /*Subscribe to plan*/

      $ch = curl_init();

      
      $plan = $request->subscription_id;
      curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/subscriptions');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, "customer=".$customer."&items[0][plan]=".$plan);
      curl_setopt($ch, CURLOPT_USERPWD, get_option('STRIPE_API_KEY') . ':' . '');

      $headers = array();
      $headers[] = 'Content-Type: application/x-www-form-urlencoded';
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $result = curl_exec($ch);
      if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
      }
      curl_close($ch);
      $result = json_decode($result);
      $subsciption = $result->id;

      if($subsciption){
        $user_bids = UserBid::where('user_id',$request->user_id)->first();
        $bids_package = SubcriptionPackage::where('subscription_id',$request->subscription_id)->first();

        $user_bids->remaining_bids = $user_bids->remaining_bids + $bids_package->bids;
        $user_bids->save();
        return ['success'=>1,'message'=>'You are subsciption is successfull'];
      }
    }
  }

  public function getallPlans(){
    $packages =SubcriptionPackage::all();

    return ['success'=>1,'plans'=>$packages];
  }
}
