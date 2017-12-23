<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = DB::table('videos')->get();

        return view('admin.pages.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.videos.form');
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
            'link' => 'required'
        ]);

        function getIdFromLink($string) {
            $video_id = explode('/', $string);
            $video_id = end($video_id);

            /*
             * https://youtu.be/WZxIGmxRGXU
             * <iframe width="560" height="315" src="https://www.youtube.com/embed/WZxIGmxRGXU" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
             * **/
            return $video_id;
        }

        DB::table('videos')->insert([
            'link' => $request->get('link'),
            'video_id' => getIdFromLink($request->get('link'))
        ]);

        return redirect()->action('Admin\VideosController@index')->with('success', 'Video created');
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
        $video = DB::table('videos')->where('id', $id)->first();

        return view('admin.pages.videos.form', compact('video'));
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
        function getIdFromLink($string) {
            $video_id = explode('/', $string);
            $video_id = end($video_id);

            /*
             * https://youtu.be/WZxIGmxRGXU
             * <iframe width="560" height="315" src="https://www.youtube.com/embed/WZxIGmxRGXU" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
             * **/
            return $video_id;
        }

        DB::table('videos')->where('id', $id)->limit(1)->update([
            'link' => $request->get('link'),
            'video_id' => getIdFromLink($request->get('link'))
        ]);

        return redirect()->action('Admin\VideosController@index')->with('success', 'Video successfully created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('videos')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Photo successfully deleted');
    }
}
