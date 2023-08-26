<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryImages;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Gallery::all();
        return view('layouts.pages.gallery.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.pages.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request -> validate([
            'title'=> 'required',
            'date'=> 'required',
        ]);

        if ($request->hasFile("cover")) {
            //get filename with extension
            $filenamewithextension = $request->file('cover')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file('cover')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            //Upload File
            $request->file('cover')->move('public/images/gallery/', $filenametostore); //--Upload Location
            // $request->file('profile_image')->storeAs('public/gallery', $filenametostore);
            //Resize image here
            $thumbnailpath = public_path('images/gallery/'.$filenametostore); //--Get File Location
            // $thumbnailpath = public_path('storage/images/gallery/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(1200, 850, function($constraint) {
                $constraint->aspectRatio();
            }); 
            $img->save($thumbnailpath);

            //---Data Save
            $post =new Gallery([
                "title" => $request->title,
                "description" => $request->description,
                "date" => $request->date,
                "cover" => $filenametostore,
                "drive_url" => $request->drive_url,
                "public" => $request->public,
                "status" => 1,
                "user_id" => Auth::user()->id,
            ]);
           $post->save();
        }

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                // Get filename with extension
                $filenamewithextension = $file->getClientOriginalName();
                // Get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                // Get file extension
                $extension = $file->getClientOriginalExtension();
                // Filename to store
                $filenametostore = $filename . '_' . time() . '.' . $extension;
                // Upload File
                $file->move('public/images/gallery/img/', $filenametostore); // Upload Location
                // Resize image here
                $thumbnailpath = public_path('images/gallery/img/' . $filenametostore); // Get File Location
                $img = Image::make($thumbnailpath)->resize(1200, 850, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($thumbnailpath);
        
                // Save Data
                $galleryImage = new GalleryImages();
                $galleryImage->gallery_id = $post->id; // Assuming $post is defined and has the ID property set
                $galleryImage->image = $filenametostore; // Save the filename in the 'image' field of the GalleryImages model
                $galleryImage->save();
            }
        }

        $notification=array('messege'=>'Gallery save successfully!','alert-type'=>'success');
        return redirect()->route('gallery.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('layouts.pages.gallery.show')->with('posts', $gallery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $posts=Gallery::findOrFail($id);
        return view('layouts.pages.gallery.edit')->with('posts',$posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        $post=Gallery::findOrFail($id);

        if ($request->hasFile("cover")) {
            if (File::exists("public/images/gallery/".$post->cover)) {
                File::delete("public/images/gallery/".$post->cover);
            }
            //get filename with extension
            $filenamewithextension = $request->file('cover')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file('cover')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            //Upload File
            $request->file('cover')->move('public/images/gallery/', $filenametostore); //--Upload Location
            // $request->file('profile_image')->storeAs('public/gallery', $filenametostore);
            //Resize image here
            $thumbnailpath = public_path('images/gallery/'.$filenametostore); //--Get File Location
            // $thumbnailpath = public_path('storage/images/gallery/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(1200, 850, function($constraint) {
                $constraint->aspectRatio();
            }); 
            $img->save($thumbnailpath);

            //---Data Save
            $post->update([
                "title" =>$request->title,
                "description"=>$request->description,
                "date"=>$request->date,
                "cover"=> $filenametostore,
                "drive_url"=>$request->drive_url,
                "public"=>$request->public,
                "user_id"=>Auth::user()->id,
            ]);
        }


        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                // Get filename with extension
                $filenamewithextension = $file->getClientOriginalName();
                // Get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                // Get file extension
                $extension = $file->getClientOriginalExtension();
                // Filename to store
                $filenametostore = $filename . '_' . time() . '.' . $extension;
                // Upload File
                $file->move('public/images/gallery/img/', $filenametostore); // Upload Location
                // Resize image here
                $thumbnailpath = public_path('images/gallery/img/' . $filenametostore); // Get File Location
                $img = Image::make($thumbnailpath)->resize(1200, 850, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($thumbnailpath);
        
                // Save Data
                $galleryImage = new GalleryImages();
                $galleryImage->gallery_id = $post->id; // Assuming $post is defined and has the ID property set
                $galleryImage->image = $filenametostore; // Save the filename in the 'image' field of the GalleryImages model
                $galleryImage->save();
            }
        }

        $notification=array('messege'=>'Gallery update successfully!','alert-type'=>'success');
        return redirect()->route('gallery.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $post=Gallery::findOrFail($id);

        if (File::exists("public/images/gallery/".$post->cover)) {
            File::delete("public/images/gallery/".$post->cover);
        }
        $images=GalleryImages::where("gallery_id",$post->id)->get();
        foreach($images as $image){
            if (File::exists("public/images/gallery/img/".$image->image)) {
                File::delete("public/images/gallery/img/".$image->image);
            }
        }
        $post->delete();
        return back();
    }
    public function deletecover($id){
        $cover=Gallery::findOrFail($id)->cover;
        if (File::exists("public/images/gallery/".$cover)) {
            File::delete("public/images/gallery/".$cover);
        }
        return back();
    }
    public function deleteimage($id){
        $images=GalleryImages::findOrFail($id)->image;
        if (File::exists("public/images/gallery/img/".$images)) {
            File::delete("public/images/gallery/img/".$images);
        }

        GalleryImages::find($id)->delete();
        return back();
    }

    /**________________________________________________________________________________
     * Dashboard View Pages
     * ________________________________________________________________________________
     */
    public function bvGallery()
    {
        $posts=Gallery::all();
        return view('layouts.pages.gallery.bv-gallery')->with('posts',$posts);
    }
    public function bvGalleryImage($id)
    {
        $posts=Gallery::findOrFail($id);
        return view('layouts.pages.gallery.bv-gallery-image')->with('posts',$posts);
    }


    function downloadFile($id){
        $images=GalleryImages::findOrFail($id);

        $filepath = public_path("images/gallery/img/".$images->image);
        return Response::download($filepath);
    }
    public function dowloads(){
        $files = [
            0 => ('images/icon/01.png'),
            1 => ('images/icon/02.png')
        ];

        $zip = new \ZipArchive;
        $zipFile = 'zip-file.zip';

        if ($zip->open(public_path($zipFile), ZipArchive::CREATE) === TRUE){
            foreach ($files as $file) {
                $pathToFile = public_path($file);
                
                $name = basename($pathToFile);

                $zip->addFile($pathToFile, $name);
            }
            $zip->close();
        }
        return response()->download(public_path($zipFile));
    }
    

}
