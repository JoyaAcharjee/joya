<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageModel;
use Intervention\Image\Facades\Image;




class UploadController extends Controller
{
    public function upload(){
        $images =ImageModel::all();

        return view('upload', compact('images'));
    }
    public function uploadImage(Request $request){
        $validatedData = $request->validate([
            // 'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,gif,png|max:8000'
        ]);

        $images=array();
        if($files=$request->file('images')){
            //if file present
            foreach($files as $file){
//                $name=$file->getClientOriginalName();
                $name = time().'.'.$file->getClientOriginalName();
                $file->move(public_path('/images'),$name);
                $images[]=$name;
                // Image::insert( ['image'=> $name]);
                $imagemodel= new ImageModel();
                $imagemodel->filename=$name;
                if( $imagemodel->save()){
                    return back()->with('msg', 'Successfully Save Your Image file');
                };
            }
        }
        // return back()->with('msg', 'Successfully Save Your Image file');



        
     /* Single Image Upload
     $title = $request->title;
    $slug = Str::of($title)->slug('-');
    $alttext = $request->alttext;
    $originalImage = $request->file('filename');
    $thumbnailImage = Image::make($originalImage);

    $thumbnailPath = public_path().'/thumbnail/';
    $originalPath = public_path().'/images/';

        $temp = $originalImage->getClientOriginalName(); //abc.jpg
        $temp_ext = explode(".", $temp); //array; [0]=abc [1]=jpg

        $ext = end($temp_ext);
        $filename = time().".".$ext;

        $thumbnailImage->save($originalPath.$filename);
        $thumbnailImage->resize(150,150);
        $thumbnailImage->save($thumbnailPath.$filename);

        $imagemodel= new ImageModel();
        $imagemodel->title = $title;
        $imagemodel->slug = $slug;
        $imagemodel->alttext = $alttext;
        $imagemodel->filename=$filename;
        if( $imagemodel->save()){
            return redirect()->back()->with('msg','Successfully Uploaded');
        };*/
    }





    // public function images($originalImage)
    // {
    //     $thumbnailImage = Image::make($originalImage);
    //     $temp = $originalImage->getClientOriginalName(); //abc.jpg
    //     $temp_ext = explode(".", $temp); //array; [0]=abc [1]=jpg

    //     $ext = end($temp_ext);
    //     $filename = uniqid(time()).".".$ext ;
    //     $originalPath = public_path().'/images/';
    //     $thumbnailImage ->save($originalPath.$filename);
    //     return $filename;
        

    // }
    public function imagesUploadPost(Request $request)
 
    {
 
        request()->validate([
 
            // 'filename' => 'required',

        ]);
        $images=array();
        foreach ($request->file('images') as $key => $value) {
 
            $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
 
            $value->move(public_path('images'), $imageName);
            $images[] = $imageName;
            $imagemodel= new ImageModel();
            $imagemodel->filename=$images;
            if( $imagemodel->save()){
                return redirect()->back()->with('msg','Successfully Uploaded');
            };
 
        }

        // return response()->json(['success'=>'Images Uploaded Successfully.']);
 
    }
    public function store(Request $request)
    {
        // $images=array();
        if ($request->hasFile('images')) {
            $originalimages = $request->file('images');
            foreach ($originalimages as $files) {

                $filename = $this->images($files);
                $imagemodel= new ImageModel();
                $imagemodel->filename=$filename;
                // $destinationPath = public_path().'images';
                // $file_name = time() . "." . $files->getClientOriginalName();
                // $files->move($destinationPath, $file_name);
                // $images[] = $file_name;
                $imagemodel->save();
                
            }
        }
                 return redirect()->back()->with('msg','Images are Successfully Uploaded');
        
    }
    public function images($originalimages){
            $thumbnailImage = Image::make($originalimages);
            $temp = $originalimages->getClientOriginalName(); //abc.jpg
            $temp_ext = explode(".", $temp); //array; [0]=abc [1]=jpg
    
            $ext = end($temp_ext);
            $filename = uniqid(time()).".".$ext ;
            $originalPath = public_path().'/images/';
            $thumbnailImage ->save($originalPath.$filename);
            return $filename;

    }
    public function uploadImages(Request $request) 
    {

        // $validator      =       $request->validate([
        //     'images'     =>     'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'images.*'  =>      'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $files          =       array();

        if($request->hasfile('images'))
         {
            foreach($request->file('images') as $image)
            {
                $name               =       time().rand(1,100).'.'.$image->extension();

                if($image->move(public_path('images'), $name)) {

                    $files[]            =       $name;
                    $file= new ImageModel();
                $file->filename=json_encode($files);
                $file->save();
                }
            }
         }

         if(!is_null($files)) {
            return back()->with('msg', 'Success! images uploaded');
         }
 
}
}

