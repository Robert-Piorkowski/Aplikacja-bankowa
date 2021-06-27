<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('accounts')
        ->join('users', 'user_id', 'users.id')
        ->where('user_id', Auth::id())->get();

        $data2 = DB::table('transactions')
        ->join('users', 'senderId', 'users.id')
        ->where('senderId', Auth::id())
        ->orWhere('receiverId', Auth::id())->get();

        return view('home', ['data' => $data, 'data2' => $data2]);
    }

    public function adminView()
    {
        $usersData = DB::table('users')->get();



        return view('admin-view', ['usersData' => $usersData]);
    }
}
