<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\VerificationCode;
use App\Mail\SendMailable;
use Hash;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

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

            $file = isset($request->image)?$request->image:'';
            $fileName = '';
            if(!empty($file)){


                $path = '/profile_images/';

                $image = $file;

                if (preg_match('/^data:image\/(\w+);base64,/', $image, $type)) {

                    $image = substr($image, strpos($image, ',') + 1);

                    $type = strtolower($type[1]);

                    $image = base64_decode($image);



                    $destinationPath    = $path;

                    if (!file_exists(public_path().$destinationPath)) {

                        mkdir(public_path().$destinationPath, 0777, true);

                    }

                    $fileName = 'image_'.time().'.'.$type;
                    $tempFile = $destinationPath . $fileName;
                    file_put_contents(public_path().$tempFile, $image);

                    $img = Image::make(public_path().$destinationPath.$fileName);
                    $img->resize(250, 250,
                        function ($constraint) {
                            $constraint->aspectRatio();
                        });

                    if (!file_exists(public_path().$destinationPath.'thumb/')) {
                        mkdir(public_path().$destinationPath.'thumb/', 0777, true);
                    }
                    $img->save(public_path().$destinationPath.'/thumb/'.$fileName);

                }

            }
            $fileName = ($fileName)?'/profile_images/'.$fileName:'';
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->phone = $request->phone;
            $user->profile_image = $fileName;
            $user->password = Hash::make($request->password);

            $user->save();

            $token = $user->createToken('blackDiamond')->plainTextToken;

            return Response::json(['success' => 1, 'message' => 'Your Account is created','user'=>$user,'token'=>$token]);


        } catch (Exception $ex) {
            DB::rollback();
        }
    });

    return $transaction;

}
public function login(){
    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

        $user = Auth::user();

        $data['token'] = $user->createToken('blackDiamond')->plainTextToken;

        $data['user'] = $user;
        return response()->json(['success' => 1,'data' =>$data,  ], 200);
    }

    else{
        return response()->json(['success' => 0,'error'=>'Unauthorised'], 401);
    }
}

public function resetPasswordCode(Request $request){

    $user = User::where('email',$request->email)->first();
    if($user){
        $password = mt_rand(10000000, 99999999);


        $data = [
            'password' => $password,
            'new' => 'Yes',
            'verify' => 'Yes'
        ];

        $sverification_code =VerificationCode::where('user_id',$user->id)->first();
        if( $sverification_code){
           $sverification_code->delete();
       }
       $verification_code =new  VerificationCode();
       $verification_code->verification_code = $password;
       $verification_code->user_id = $user->id;
       $verification_code->save();

      // Mail::to($request['user_identy'])->send(new SendMailable($data));

       return array('success' => 1,  'message' => 'Verification code is sent to your '.$request->email,'verification_code'=>$password);
   }
   return array('success' => 0,  'message' => 'User does not exist');
}

public function resetPassword(Request $request){

 $user = User::where('email',$request->email)->first();

 $verification_code =VerificationCode::where('verification_code',$request->verification_code)->first();

 if($verification_code){

    if($user){

        if(!isset($request->password)){
            return array('success' => 0,  'message' => 'Please enter the password');
        }

        $password = $request->password;


        $data = [
            'password' => $password,
            'new' => 'Yes'
        ];

        $user->password = Hash::make($password);
        $user->save();

        $verification_code->delete();
        return array('success' => 1,  'message' => 'Your paswweord is reset');
    }
    return array('success' => 0,  'message' => 'User does not exist');
}
return array('success' => 0,  'message' => 'Wrong Verification code');
}
public function getUser(Request $request){
 $user = User::find($request->id);
 if($user){

     return array('success' => 1,  'user' => $user);

 }
}
}
