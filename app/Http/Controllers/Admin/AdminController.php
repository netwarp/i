<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminController extends Controller
{
    public function getIndex() {
        $photos_count = DB::table('photos')->count();
        $videos_count = DB::table('videos')->count();
        $showrooms_count = DB::table('showrooms')->count();

        return view('admin.pages.index', compact('photos_count', 'videos_count', 'showrooms_count'));
    }
}
