<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\protfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class categoryController extends Controller
{
    public function create()
    {
        $categories = category::all();
        $Treshedcategory = category::onlyTrashed()->get();
        return view('dashbord.layouts.category.createCategory',compact('categories','Treshedcategory'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "category_name" => 'required|unique:categories,category_name,'.$request->id,
        ]);
        //create slug
        $slug = Str::slug($request->category_name, '-');

        category::insert([
            "category_name" => $request->category_name,
            "slug" => $slug,
            'created_at' => now(),
        ]);
        return back()->withSuccess('category Create successful');

    }

    public function edit($id)
    {
        return view('dashbord.layouts.category.edit',[
           'category' => category::find($id),
        ]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            "category_name" => 'unique:categories,category_name,'.$id,
        ]);
        //create slug
        $slug = Str::slug($request->category_name, '-');
        category::find($id)->update([
            "category_name" => $request->category_name,
            "slug" => $slug,
        ]);
        return back()->withSuccess('category Update successful');

    }

    public function destroy($id)
    {
        $protfolioPosts = protfolio::where('category_id', $id)->get();
        foreach ($protfolioPosts as $Posts) {
            $Posts->delete();
        }

        category::find($id)->delete();
        return back()->withSuccess('Category tem delete ');
    }


    public function restor($id)
    {
        category::onlyTrashed()->find($id)->restore();
        return back();
    }

    public function delete($id)
    {
        $protfolioPosts = protfolio::onlyTrashed()->where('category_id', $id)->get();

        foreach ($protfolioPosts as $Posts) {
            unlink(base_path("public/upload/protfolio_image/" . $Posts->protfolio_image));
            $Posts->forceDelete();
        }

        category::onlyTrashed()->find($id)->forceDelete();
        return back()->withSuccess('category Deleted !');
    }
}
