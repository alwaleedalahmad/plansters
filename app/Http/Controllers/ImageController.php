<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageModel;
use Image;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $image = ImageModel::latest()->first();
        return view('createimage', compact('image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
         ]);
        $originalImage= $request->file('filename');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/images/';
        $thumbnailImage->save($originalPath.$originalImage->getClientOriginalName());
        $thumbnailImage->resize(900,600);
        $thumbnailImage->save($thumbnailPath.$originalImage->getClientOriginalName());

        $imagemodel= new ImageModel();
        $imagemodel->filename=$originalImage->getClientOriginalName();
        $imagemodel->save();

        return back()->with('success', 'Your images has been successfully Upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        return view('edit_delete_image');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$filename )
    {
        //

        $this->validate($request, [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
         ]);
        //  $image=ImageModel::where('filename',$filename);
        $originalImage= $request->file('filename');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/images/';
        $thumbnailImage->save($originalImage->getClientOriginalName());
        $thumbnailImage->resize(900,600);
        $thumbnailImage->save($thumbnailPath.$originalImage->getClientOriginalName());

        $imagemodel= ImageModel::where('filename',$filename)->first(); ;
        $imagemodel->filename=$originalImage->getClientOriginalName();
        $imagemodel->save();
    // $image->filename=$request->filename;
    // $image->save();
    return back()->with('success','update success'.$imagemodel->filename);
    }

    public function image($filename)
    {
        $image = ImageModel::where('filename',$filename)->first();
        return view('image', compact('image'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($filename)
    {
        //
    // $image=ImageModel::find($filename);
    // $image->delete();
    // return redirect('edite_delete_image');
    $image=ImageModel::where('filename',$filename)->first();
    // $thumbnailImage =  Image::make($image);
    // $thumbnailPath = public_path().'/thumbnail/';
    // $thumbnailImage->delete($thumbnailPath.$image->filename);
    $image->delete();
    return redirect('edit');
    }
}
