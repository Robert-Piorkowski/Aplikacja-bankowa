<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransferDataController extends Controller
{
    public function index()
    {
        $data = DB::table('accounts')
        ->join('users', 'user_id', 'users.id')
        ->where('user_id', Auth::id())->get();
        if (Auth::check()) {
            return view('transfer', ['data' => $data]);
        } else {
        return redirect('login');
        }

    }
}
