<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;
use Image;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showrooms_count = DB::table('showrooms')->count();

        $photos = DB::table('photos')->get();

        return view('admin.pages.photos.index', compact('photos', 'showrooms_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $showrooms = DB::table('showrooms')->select('id', 'title')->get();

        return view('admin.pages.photos.form', compact('showrooms'));
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
            'title' => 'required|unique:photos',
            'description' => 'required',
            'order' => 'required',
            'showroom_id' => 'required',
            'file' => 'required|max:2000',
        ]);

        $file = $request->file('file');

        $extension = $file->guessExtension();

        $file_name = str_slug($request->get('title')) . '.' . "$extension";

        $file->storeAs('images', $file_name);

        DB::table('photos')->insert([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'order' => $request->get('order'),
            'showroom_id' => $request->get('showroom_id'),
            'path' => $file_name
        ]);

        return redirect()->action('Admin\PhotosController@index')->with('success', 'Photo successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = DB::table('photos')->where('id', $id)->first();
        $showrooms = DB::table('showrooms')->select('id', 'title')->get();

        return view('admin.pages.photos.form', compact('photo', 'showrooms'));
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
        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'order' => $request->get('order'),
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $extension = $file->guessExtension();

            Storage::delete("/images/" . DB::table('photos')->where('id', $id)->first()->path );

            $file_name = str_slug($request->get('title')) . '.' . "$extension";

            $file->storeAs('images', $file_name);

            $data['path'] = $file_name;
        }

        DB::table('photos')->where('id', $id)->limit(1)->update($data);

        return redirect()->action('Admin\PhotosController@index')->with('success', 'Photo successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = DB::table('photos')->where('id', $id)->first()->path;
        Storage::delete("/images/" . $path);
        DB::table('photos')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Photo successfully deleted');
    }
}
