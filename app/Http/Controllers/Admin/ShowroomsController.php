<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ShowroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showrooms = DB::table('showrooms')->orderBy('id', 'desc')->get();

        return view('admin.pages.showrooms.index', compact('showrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.showrooms.form');
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
            'title' => 'required',
            'description' => 'required',
            'order' => 'required'
        ]);

        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'order' => $request->get('order'),
        ];

        DB::table('showrooms')->insert($data);

        return redirect()->action('Admin\ShowroomsController@index')->with('success', 'Showroom successfully created');
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
        $showroom = DB::table('showrooms')->where('id', $id)->first();

        return view('admin.pages.showrooms.form', compact('showroom'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'order' => 'required'
        ]);

        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'order' => $request->get('order'),
        ];

        DB::table('showrooms')->where('id', $id)->update($data);

        return redirect()->action('Admin\ShowroomsController@index')->with('success', 'Showroom successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('showrooms')->where('id', $id)->delete();
        return redirect()->action('Admin\ShowroomsController@index')->with('success', 'Showroom successfully deleted');
    }
}
