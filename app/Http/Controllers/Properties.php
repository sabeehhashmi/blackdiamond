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
return User::where('role_id', '!=', '2')->search($request->searchParam)->paginate(10);

public function filterPostsSearch($category,$longitude,$latitude,$type,$order=''){
  /*$obj = Posts::select('posts.id')->where('category_id',$category)->get();
  return $obj;*/
  //Set Max Distance

  $role = 'sparetime';
  if(isset($_COOKIE['current_user']) && $_COOKIE['current_user']=='host'){
    $role = 'host';
  }
  $maxDistance = 100000;

        //Query injections in case cordinates are not defined
  $inj = ", 'unknown' as distance";

        //Check if client has provided coordinates

  if ($latitude && $latitude) {
    $latitude = (double)$latitude;
    $longitude = (double)$longitude;
    if ($longitude != null && $longitude != '' && $latitude != null && $latitude != '') {
    /*            //Query injection in case cordinates are defined
      $inj = "ifnull((SELECT
       (
      3959 * acos (
      cos ( radians(31.459) )
      * cos( radians( longitude ) )
      * cos( radians( latitude ) - radians(74.269) )
      + sin ( radians(31.459) )
      * sin( radians( latitude ) )
      )
      ) AS distance
      FROM posts
      HAVING distance < 30), 'unknown') as distance";*/
      $inj = " ifnull((select

      (case when posts.longitude is null then 'unknown' else ( 6371 *

      acos( cos( radians($latitude) ) *

      cos( radians( posts.latitude ) ) *

      cos( radians( posts.longitude ) -

      radians($longitude) ) +

      sin( radians($latitude) ) *

      sin(radians(posts.latitude)) ) ) end) AS distance

      from posts dtpst where dtpst.id = posts.id

    ), 'unknown') as distance";

  }


}
// $obj = Posts::select('posts.id',DB::raw($inj))->where('category_id',$category)->get();
$obj = Posts::select(DB::raw("posts.*, $inj"))->whereRaw("(" . str_replace('as distance', '', ltrim($inj, ',')) . ") <= 5")->where('category_id',$category)->where('user_id','!=',Auth::id());

if($order == 'high'){
  $obj = $obj->orderBy('price', 'desc')->get();
}
elseif($order == 'low'){
  $obj = $obj->orderBy('price', 'asc')->get();
}
elseif($order == 'new'){
  $obj = $obj->orderBy('id', 'desc')->get();
}
elseif($order == 'old'){
  $obj = $obj->orderBy('id', 'asc')->get();
}
else{
  $obj = $obj->get();
}
$previous_data = array('category'=>$category,'longitude'=>$longitude,'latitude'=>$latitude,'type'=>$type,'order'=>$order);
return view('sparetime.search-post-results', compact('obj','previous_data'));

/*$obj = Posts::select('posts*')->where('category_id',$category)->get();
return $obj;*/
}

}
