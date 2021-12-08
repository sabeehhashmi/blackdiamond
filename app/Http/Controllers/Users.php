<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Hash;
use Response;

class Users extends Controller
{
 public function registerNewUser(Request $request)
 {

    $transaction = DB::transaction(function () use ($request) {
        try {

            $user = User::where('email',$request->email)->first();

            if($user){
                return Response::json(['success' => 0,  'message' => 'Email Already Exist']);
            }

            $user = User::where('phone',$request->phone)->first();
            if($user){
                return Response::json(['success' => 0,  'message' => 'Phone Already Exist']);
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);

            $user->save();




            return Response::json(['success' => 1, 'message' => 'Your Account is created']);


        } catch (Exception $ex) {
            DB::rollback();
        }
    });

    return $transaction;

}
}
