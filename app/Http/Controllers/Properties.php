<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\Attachment;
use Intervention\Image\Facades\Image;

class Properties extends Controller
{
 public function PropertyTypes(){
    $property_types =PropertyType::all();

    return $property_types;
}
public function saveProperty(Request $request){

    $files = isset($request->images)?$request->images:'';
    $perperty =  Property::find($request->id);
    if(empty($perperty )){
      $perperty =  new Property();  
  }

  $perperty->name =  $request->name;
  $perperty->status =  $request->status;  /*1 for rent 2 for sale*/
  $perperty->propert_type_id =  $request->property_type_id;
  $perperty->price =  $request->price;
  $perperty->area =  $request->area;
  $perperty->property =  $request->property;  /*1 for Occupied and 2 for Vacant*/
  $perperty->rental =  $request->rental; /*1 for yes and two for no*/
  $perperty->address =  $request->address;
  $perperty->city =  $request->city;
  $perperty->state =  $request->state;
  $perperty->zipcode =  $request->zipcode;
  $perperty->detail_information =  $request->detail_information;
  $perperty->seller_id =  $request->seller_id;
  $perperty->longitude =  $request->longitude;
  $perperty->latitude =  $request->latitude;

  $perperty->save();

  if(!empty($files)){
    foreach($files as $file){

        $path = '/properties/';

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


            $attachment = new Attachment;

            $attachment->source_id = $perperty->id;
            $attachment->path = '/properties/'.$fileName;
            $attachment->save();
        }


    }
}

$perperty->images = Attachment::where('source_id',$perperty->id)->get();

return ['success'=>1,'perperty'=>$perperty];
}

public function getSellerProperties(Request $request){
    $perperties =  Property::where('seller_id',$request->seller_id)->with('images')->get();
    return ['success'=>1,'perperties'=>$perperties];
}
/*get all properties*/
public function getAllProperties(Request $request){
    $perperties =  Property::with('images')->get();
    return ['success'=>1,'prperties'=>$perperties];
}
public function getSingleProperty(Request $request){
    $perperty =  Property::with('images')->find($request->id);
    return ['success'=>1,'property'=>$perperty];
}
/*delete property*/
public function deleteProperty(Request $request){
    $perperty =  Property::find($request->id);
    if($perperty)
        $perperty->delete();
    return ['success'=>1,'message'=>'Property deleted'];
}

}
