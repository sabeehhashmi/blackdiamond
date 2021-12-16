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

    public function addPost($request){
        //return $request;
        $user_login = UsersLogin::where('device_token',$request['user_token'])->first();
        if($user_login){

            $post = new Post();
            $id_type = (isset($request['id_type']) && $request['id_type'] =='real_id')?'real_id':'mask_id';
            $message_type = $request['message_type'];
            $post->user_id = $user_login->user_id;
            $post->post_type = $message_type;
            $post->description = $request['description'];
            if(isset($request['post_origin'])){

                $post->post_origin = $request['post_origin'];
            }
            $post->id_type = $id_type;
            if($message_type == 'template'){
                $post->template_id = $request['template_id'];

                $template   = Template::find($post->template_id);

                if(empty($template)){
                    return array('success' => 0,'login'=>1,  'message' => 'Template not found');
                }
            }
            $post->save();

            $files = isset($request['files'])?$request['files']:'';
            //dd($files);

            if( $message_type == 'template'){


                /*$template_url = $template->template_url;

                $attachment = new PostAttachment;

                $attachment->post_id = $post->id;
                $attachment->attachment = $template_url;
                $attachment->save();*/
                foreach($files as $file){

                    $path = '/posts/';

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


                        $attachment = new PostAttachment;

                        $attachment->post_id = $post->id;
                        $attachment->attachment = '/posts/'.$fileName;
                        $attachment->save();
                    }


                }

                $post = Post::where('id',$post->id)->with('attachments')->first();
                return array('success' => 1,'login'=>1,  'message' => 'Post Updated','data'=>$post );
            }
            elseif(!empty($files)){

                foreach($files as $file){
                    //dd(phpinfo());

                    /*if($file->getSize() > 25){

                        return array('success' => 0,'login'=>1,  'message' => 'File Size must be less than 25 mb');
                    }*/
                    $file         = $file;

                    $type         = $file->getClientOriginalExtension();

                    $date         = date('Y-m-d');

                    $fileName     = md5(uniqid().$date).'.'.$type;

                    $destinationPath = public_path().'/posts/';
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0777, true);
                    }
                    $tempFile = $destinationPath . $fileName;

                    file_put_contents($tempFile, file_get_contents($file));

                    $attachment = new PostAttachment;

                    $attachment->post_id = $post->id;
                    $attachment->attachment = '/posts/'.$fileName;
                    $attachment->save();

                }
            }

            $post = Post::where('id',$post->id)->with('attachments')->first();
            return array('success' => 1,'login'=>1,  'message' => 'Post Updated','data'=>$post );
        }

        return array('success' => 0,'login'=>0,  'message' => 'You are logedout from this device');

    }
}
