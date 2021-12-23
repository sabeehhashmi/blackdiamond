<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Setting;

class Settings extends Controller
{
    function saveSetting(Request $request){
        foreach($request as $key => $value){
            $setting = Setting::where('name',$key)->first();
            $setting->value = $value;
            $setting->save();
        }
        

    }
    public function getSettings(Request $request) {

        $settings =Setting::all();

        return view("admin.settings",compact('settings'));

    }
}
