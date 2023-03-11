<?php


namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image=Image::all();
        return response()->json($image);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=new Image();
        if($request['nameImage']){
            $img=$request['nameImage'];
            $nameImg=time().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put($nameImg,File::get($img));
            $image->name=$nameImg;
        }
        $image->url='http://127.0.0.1:8000/';
        $image->save();
        return redirect()->route('image.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image=Image::find($id);
        return response()->json($image);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image=Image::find($id);
        if($request['nameImage']){
            Storage::disk('public')->delete($image->name);
            $img=$request['nameImage'];
            $nameImg=time().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put($nameImg,File::get($img));
            $image->name=$nameImg;
        }       
   
        $image->save();
        return redirect()->route('image.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Image::find($id);
        Storage::disk('public')->delete($image->name);
        $image->delete();
        return redirect()->route('image.index');
        return response()->json(
            [
                'status' => 200,
                'message' => 'Delete xong !!!'
            ]
        );
    }
}
