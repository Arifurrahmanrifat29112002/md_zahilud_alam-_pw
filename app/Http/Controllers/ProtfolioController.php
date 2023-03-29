<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\protfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProtfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $protfolio = protfolio::paginate(5)->withQueryString();
       $protfolioTrashed = protfolio::onlyTrashed()->get();
        return view('dashbord.protfolio.protfolios',compact('protfolio','protfolioTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashbord.protfolio.createProtfolio',[
            'categories' => category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'category_id' => 'required',
            'protfolio_image' => 'required|mimes:png,jpg',
         ]);
        $category_name = category::where('id',$request->category_id)->value('category_name');
         //category image upload code
         $file_name = auth()->id() . '-' . time() . '.' . $request->file('protfolio_image')->getClientOriginalExtension();
         $img = Image::make($request->file('protfolio_image'));
         $img->save(base_path('public/upload/protfolio_image/' . $file_name), 80);
        //category data insert a table
            protfolio::insert([
                "category_id" =>  $request->category_id,
                "category_name" =>  $category_name,
                "protfolio_image" =>  $file_name,
                'created_at' => now(),
            ]);

            return back()->withSuccess('protfolio Post Create successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\protfolio  $protfolio
     * @return \Illuminate\Http\Response
     */
    public function show(protfolio $protfolio)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\protfolio  $protfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $protfolios = protfolio::find($id);
       $categories = category::all();
      return view('dashbord.protfolio.editProtfolio',compact('protfolios','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\protfolio  $protfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            "protfolio_image" => "mimes:png,jpg"
         ]);
         if($request->hasFile('protfolio_image')){
            $protfolio_info = protfolio::find($id);
            $image =  $protfolio_info->protfolio_image;

            unlink(base_path('public/upload/protfolio_image/' .  $image ));
            $file_name = auth()->id() . '-' . time() . '.' . $request->file('protfolio_image')->getClientOriginalExtension();
            $img = Image::make($request->file('protfolio_image'));
            $img->save(base_path('public/upload/protfolio_image/' . $file_name), 80);

            protfolio::find($id)->update([
                "protfolio_image" =>  $file_name,
            ]);
        }

        $category_name = category::where('id',$request->category_id)->value('category_name');
        protfolio::find($id)->update([
                "category_id" =>  $request->category_id,
                "category_name" =>  $category_name,
        ]);
        return back()->withSuccess('Protfolio Update successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\protfolio  $protfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        protfolio::find($id)->delete();
        return back()->withSuccess('protfolio tem delete ');
    }

    public function restor($id)
    {
        $category_id = protfolio::onlyTrashed()->find($id)->category_id;
        $category_id_deleted_at_check = category::withTrashed()->find($category_id)->deleted_at;
        if ($category_id_deleted_at_check == null) {
            protfolio::onlyTrashed()->find($id)->restore();
            return back()->withSuccess('protfolio Post restore successful');
        } else {
            return back()->withSuccess('before restore category then restore this protfolio post !');
        }

    }

    public function delete($id)
    {
        $protfolio_image = protfolio::onlyTrashed()->find($id)->protfolio_image;
        unlink(base_path("public/upload/protfolio_image/" . $protfolio_image));
        protfolio::onlyTrashed()->find($id)->forceDelete();
        return back()->withSuccess('before restore category then restore this protfolio post !');
    }
}
