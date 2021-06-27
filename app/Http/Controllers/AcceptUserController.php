<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AcceptUserController extends Controller
{
    public function accept(Request $req){
        $id = $req->input('id');
        if(Auth::user()->is_admin == 1){
            DB::table('users')
            ->where('id', $id)
            ->update(['accepted' => 1]);


            return redirect('admin-view');
        }

    }
    public function accepted(){
        if(Auth::check()){
            if(Auth::user()->accepted == 1){
                return redirect('/home');
            } else {
                return view('/not-accepted');
            }
        } else {
            return redirect('login');
        }
    }
}
