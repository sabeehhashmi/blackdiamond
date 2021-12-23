<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class Settings extends Controller
{
    function saveSetting(Request $request){
        $request= $_POST;
        foreach($request as $key => $value){
            
            $setting = Setting::where('name',$key)->first();
            if( $setting){
                $setting->value = $value;
                $setting->save();
            }
        }
        return redirect('/admin/settings');

    }
    public function getSettings(Request $request) {

        $settings =Setting::all();

        return view("admin.settings",compact('settings'));

    }
}
