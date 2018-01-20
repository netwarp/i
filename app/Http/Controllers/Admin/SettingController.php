<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SettingController extends Controller
{
    public function getIndex() {
    	return view('admin.pages.setting.index');
    }

    public function postIndex(Request $request) {
    	$password = $request->get('password');
    	$confirmation = $request->get('confirmation');
    	
    	$request->validate([
		    'password' => 'required | min:8',
		    'confirmation' => 'required | same:password',
		]);

    	$user = DB::table('users')->where('id', 1);

    	$user->update(['password' => bcrypt($password)]);

    	return redirect()->back()->with('success', 'Password updated');
    }
}
