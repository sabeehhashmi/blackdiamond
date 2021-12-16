<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;

class Properties extends Controller
{
     public function PropertyTypes(){
        $property_types =PropertyType::all();

        return $property_types;
    }
    public function saveProperty(Request $request){

        $perperty =  new Property();
        $perperty->name =  $request->name;
    }
}
