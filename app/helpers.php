<?php

use App\Models\Setting;

function get_option($name){

	$setting = Setting::where('name',$name)->first();
	$value = '';
	if( $setting){
		$value = $setting->value;

	}

	return $value;

}