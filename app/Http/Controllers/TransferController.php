<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TransferController extends Controller
{
    public function transfer(Request $req){

        $req->validate([
            'name' => ['required', 'max:255'],
            'receiveracc' => ['required', 'digits:26', 'max:255'],
            'title' => ['required', 'max:255'],
            'amount' => ['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/', 'max:255'],
        ],
        [
            'name.required' => 'To pole jest wymagane',
            'name.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'receiveracc.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'receiveracc.digits' => 'Numer konta jest niepoprawny',
            'receiveracc.required' => 'To pole jest wymagane',
            'title.required' => 'To pole jest wymagane',
            'title.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'amount.required' => 'To pole jest wymagane',
            'amount.regex' => 'W tym polu możesz wpisać tylko cyfry!',
            'amount.max' => 'To pole może zawierać maksymalnie 255 znaków',
        ]);


        $name = $req->input('name');
        $receiveracc = $req->input('receiveracc');
        $title = $req->input('title');
        $amount = $req->input('amount');


        $myacc = DB::table('accounts')
        ->join('users', 'user_id', 'users.id')
        ->where('user_id', Auth::id())->get();

        $receiverId = DB::table('accounts')
        ->select('user_id')
        ->join('users', 'user_id', 'users.id')
        ->where('accountNumber', $receiveracc)->get();

        foreach ($myacc as $number) {
            $number->accountNumber;
            $number->balance;
        }
        foreach ($receiverId as $userid) {
            $userid->user_id;
        }
        
        if($number->balance >= $amount && $number->balance >= 0){

        DB::table('transactions')->insert([
                'receiverId' => $userid->user_id,
                'senderId' => Auth::user()->id,
                'receiverName' => $name,
                'senderName' => Auth::user()->name . " " . Auth::user()->surname,
                'receiverNumberAccount' => $receiveracc,
                'senderNumberAccount' => $number->accountNumber,
                'title' => $title,
                'amount' => $amount,
             ]);

        DB::table('accounts')
        ->where('user_id', Auth::id())
        ->update(['balance' => DB::raw('balance-'.$amount)]);
     
        DB::table('accounts')
        ->where('accountNumber', $receiveracc)
        ->update(['balance' => DB::raw('balance+'.$amount)]);
     
        return redirect('transfer')->with('success', 'Przelew został wykonany pomyślnie!');
        } else {
            return redirect('transfer')->with('error', 'Przelew nie został wykonany!');
        }
    }
}
