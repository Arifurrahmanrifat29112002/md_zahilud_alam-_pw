<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
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
       $user_info = User::find(auth()->id());
       return view('dashbord.about.about',compact('user_info'));
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
            'nav_logo' => 'mimes:png',
            'main_logo' => 'mimes:png',
            'about_image' => 'mimes:png,jpg',
         ]);
            /**
             * nav logo
            */
            $user_id = Auth::id();

            if($request->hasFile('nav_logo')){
                $user_logo = User::find($user_id)->value('nav_logo');
                if ($user_logo == null) {

                    $file_name = auth()->id() . '-' . time() . '.' . $request->file('nav_logo')->getClientOriginalExtension();
                    $img = Image::make($request->file('nav_logo'));
                    $img->save(base_path('public/upload/nav_logo/' . $file_name), 80);

                    DB::table('users')->update([
                        "nav_logo" => $file_name,
                    ]);
                    return back()->withSuccess('About info added successful');

                } else {
                     $nav_logo_old = User::find($user_id)->value('nav_logo');
                     unlink(base_path('public/upload/nav_logo/' .  $nav_logo_old ));

                     $file_name = auth()->id() . '-' . time() . '.' . $request->file('nav_logo')->getClientOriginalExtension();
                     $img = Image::make($request->file('nav_logo'));
                     $img->save(base_path('public/upload/nav_logo/' . $file_name), 80);

                     DB::table('users')->update([
                        "nav_logo" => $file_name,
                    ]);
                    return back()->withSuccess('About info Update');
                }

            }
            /**
             * main_logo
            */
            if($request->hasFile('main_logo')){
                $user_logo = User::find($user_id)->value('main_logo');
                if ($user_logo == null) {

                    $file_name = auth()->id() . '-' . time() . '.' . $request->file('main_logo')->getClientOriginalExtension();
                    $img = Image::make($request->file('main_logo'));
                    $img->save(base_path('public/upload/main_logo/' . $file_name), 80);

                    DB::table('users')->update([
                        "main_logo" => $file_name,
                    ]);
                    return back()->withSuccess('About info added successful');

                } else {
                     $main_logo_old = User::find($user_id)->value('main_logo');
                     unlink(base_path('public/upload/main_logo/' .  $main_logo_old ));

                     $file_name = auth()->id() . '-' . time() . '.' . $request->file('main_logo')->getClientOriginalExtension();
                     $img = Image::make($request->file('main_logo'));
                     $img->save(base_path('public/upload/main_logo/' . $file_name), 80);

                     DB::table('users')->update([
                        "nav_logo" => $file_name,
                    ]);
                    return back()->withSuccess('About info Update');
                }


            }
            /**
             * about_image
            */
            if($request->hasFile('about_image')){
                $user_logo = User::find($user_id)->value('about_image');
                if ($user_logo == null) {

                    $file_name = auth()->id() . '-' . time() . '.' . $request->file('about_image')->getClientOriginalExtension();
                    $img = Image::make($request->file('about_image'));
                    $img->save(base_path('public/upload/about_image/' . $file_name), 80);

                    DB::table('users')->update([
                        "about_image" => $file_name,
                    ]);
                    return back()->withSuccess('About info added successful');

                } else {
                     $about_image_old = User::find($user_id)->value('about_image');
                     unlink(base_path('public/upload/about_image/' .  $about_image_old ));

                     $file_name = auth()->id() . '-' . time() . '.' . $request->file('about_image')->getClientOriginalExtension();
                     $img = Image::make($request->file('about_image'));
                     $img->save(base_path('public/upload/about_image/' . $file_name), 80);

                     DB::table('users')->update([
                        "about_image" => $file_name,
                    ]);
                    return back()->withSuccess('About info Update');
                }


            }

            DB::table('users')->update([
                    "main_title" =>  $request->main_title,
                    "about_description" =>  $request->about_description,
                    "address" =>  $request->address,
                    "number" =>  $request->number,
                    "facebook" =>  $request->facebook,
                    "instagram" =>  $request->instagram,
                    "twitter" =>  $request->twitter,
                    "linkdin" =>  $request->linkdin,
                    "youtube" =>  $request->youtube,
                    "behance" =>  $request->behance,
                    'created_at' => now(),
            ]);
            return back()->withSuccess('Info Submit successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function show(about $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(about $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, about $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(about $about)
    {
        //
    }
}
