<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\Category;
use App\Models\Attachment;
use App\Models\PropertyBid;
use App\Models\UserBid;
use Intervention\Image\Facades\Image;
Use DB;
use App\Models\Setting;

class Properties extends Controller
{
 public function PropertyTypes(){
    $property_types = Category::all();

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

/*delete image*/
public function deleteImage(Request $request){

    $image = Attachment::find($request->id);

    if($image)
        $image->delete();

    return ['success'=>1,'message'=>'Image deleted'];
}

public function searchProperty(Request $request){
    $latitude= $request->latitude;
    $longitude= $request->longitude;


    $latitude = (double)$latitude;
    $longitude = (double)$longitude;

    $maxDistance = 100000;

    $inj = ", 'unknown' as distance";

    if ($longitude != '' &&  $latitude != '') {

        $inj = " ifnull((select

        (case when properties.longitude is null then 'unknown' else ( 6371 *

        acos( cos( radians($latitude) ) *

        cos( radians( properties.latitude ) ) *

        cos( radians( properties.longitude ) -

        radians($longitude) ) +

        sin( radians($latitude) ) *

        sin(radians(properties.latitude)) ) ) end) AS distance

        from properties dtpst where dtpst.id = properties.id

    ), 'unknown') as distance";
    $obj = Property::select(DB::raw("properties.*, $inj"))->whereRaw("(" . str_replace('as distance', '', ltrim($inj, ',')) . ") <= 5")->search($request->searchParam);
}
else{
    $obj = Property::search($request->searchParam);
}

if($request->propert_type_id){
  $obj = $obj->where('propert_type_id',$request->propert_type_id);  
}

/*Price Filter*/
if($request->start_price && $request->end_price){
 $obj = $obj->where('price','>=',$request->start_price)->where('price','<=',$request->end_price);     
}
elseif($request->start_price){
  $obj = $obj->where('price','>=',$request->start_price);  
}
elseif($request->end_price){
  $obj = $obj->where('price','<=',$request->end_price);  
}


$obj = $obj->with('images')->get();

return ['success'=>1,'properties'=>$obj];

}
public function addBid(Request $request){


    $user_bids = UserBid::where('user_id',$request->user_id)->first();

    if(empty($user_bids)){

     $free_bids = get_option('free_bids');
     $user_bids = new UserBid;
     $user_bids->user_id = $request->user_id;
     $user_bids->remaining_bids =$free_bids;
     $user_bids->save();
 }
 if($user_bids->remaining_bids < 1){
    return ['success'=>0,'message'=>"Your free bids are consumed, please subscribe to package to purchase new bids"];
}
$property_bid = new PropertyBid();
$property_bid->user_id = $request->user_id;
$property_bid->property_id = $request->property_id;
$property_bid->title = $request->title;
$property_bid->offer_description = $request->offer_description;
$property_bid->start_price = $request->start_price;

$property_bid->save();

$user_bids->remaining_bids =$user_bids->remaining_bids-1;
$user_bids->save();
return ['success'=>1,'message'=>"Bid for this property has been added"];

}
public function getBids(Request $request){
   $perperty =  Property::with('images','bids')->find($request->id);
   return ['success'=>1,'prperty'=>$perperty];

}


/*Admin Area*/

public function getProperty($id){
    $perperty =  Property::with('images','bids')->find($id);
    return view('admin.propertydetail',compact('perperty'));
}

public function getPropertyBids($id){
   $property =  Property::with('images','bids')->find($id);

   return view('admin.propertybids',compact('property'));

}

public function sellerProperties($id){
    $perperties =  Property::where('seller_id',$id)->with('images')->get();
    return view('admin.sellerproperties',compact('perperties'));
}
public function ceoMessage()
{
    $ceo_message = Setting::where('name','ceo_message')->first();

    return ['success'=>1,'message'=>$ceo_message->value];
}
}
