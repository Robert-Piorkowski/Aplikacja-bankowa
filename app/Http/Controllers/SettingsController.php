<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function settings(Request $req){
        $name = $req->input('name');
        $surname = $req->input('surname');
        $pesel = Auth::user()->pesel;
        $city = $req->input('city');
        $postalCode = $req->input('postalCode');
        $street = $req->input('address');
        $phone = $req->input('phone');
        $email = $req->input('email');
        if($name == NULL){
            $name = Auth::user()->name;
        } 
        if($surname == NULL){
            $surname = Auth::user()->surname;
        }
        if($city == NULL){
            $city = Auth::user()->city;
        }
        if($postalCode == NULL){
            $postalCode = Auth::user()->postalCode;
        }
        if($street == NULL){
            $street = Auth::user()->address;
        }
        if($phone == NULL){
            $phone = Auth::user()->phone;
        }
        if($email == NULL){
            $email = Auth::user()->email;
        }

        $req->validate([
            'name' => ['nullable', 'regex:/^[a-zA-ZżźćńółęąśŻŹĆĄŚĘŁÓŃ]+$/', 'max:255'],
            'surname' => ['nullable', 'regex:/^[a-zA-ZżźćńółęąśŻŹĆĄŚĘŁÓŃ]+$/', 'max:255'],
            'city' => ['nullable', 'string', 'regex:/^[a-zA-ZżźćńółęąśŻŹĆĄŚĘŁÓŃ]+$/', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'phone:PL'],
            'postalCode' => ['nullable', 'postal_code:PL'],
        ],
        [
            'name.regex' => 'To pole nie może zawierać cyfr',
            'name.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'surname.regex' => 'To pole nie może zawierać cyfr',
            'surname.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'city.regex' => 'To pole nie może zawierać cyfr',
            'city.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'address.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'phone.phone' => 'To pole musi zawierać 9 znaków',
            'phone.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'postalCode.postal_code' => 'Wpisz poprawny format kodu pocztowego (12-345)',
        ]);
        
        DB::table('users')
        ->where('id', Auth::id())
        ->update(['name' => $name, 'surname' => $surname, 'city' => $city, 'postalCode' => $postalCode, 'address' => $street, 'phone' => $phone]);

        return view('settings');
    }
    public function check(){
        if(Auth::check()){
            if(Auth::user()->accepted == 1){
                return view('/settings');
            } else {
                return view('/not-accepted');
            }
        } else {
            return redirect('login');
        }
    }
}
