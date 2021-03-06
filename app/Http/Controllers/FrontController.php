<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use File;
use Response;
use App\Models\Showroom;

class FrontController extends Controller
{
    public function getIndex() {
        $photos = DB::table('photos')->orderBy('order')->get();
        $videos = DB::table('videos')->get();

        $showrooms = Showroom::all();

        return view('front.index', compact('photos', 'videos', 'showrooms'));
    }

    public function getLogin() {
        return view('front.login');
    }

    public function postLogin(Request $request) {
        $name = $request->get('name');
        $password = $request->get('password');

        if (Auth::attempt(['name' => $name, 'password' => $password])) {
            return redirect('/admin');
        }
        else {
            return redirect()->back()->with('error', 'Invalid password');
        }
    }

    public function file($path) {
        $path = storage_path("app/images/$path");

        if (!File::exists($path)) {
            return;
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', $type);
        return $response;
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
