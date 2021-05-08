<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Account;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'surname' => ['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'pesel' => ['required', 'digits:11'],
            'city' => ['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'phone:PL'],
            'postalCode' => ['required', 'postal_code:PL'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rule' => ['required'],
            'password' => ['required', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@#$%^&*()]).*$/', 'string', 'min:8', 'confirmed'],
        ],
        [
            'name.required' => 'To pole jest wymagane',
            'name.regex' => 'To pole nie może zawierać cyfr',
            'name.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'surname.regex' => 'To pole nie może zawierać cyfr',
            'surname.required' => 'To pole jest wymagane',
            'surname.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'pesel.required' => 'To pole jest wymagane',
            'pesel.digits' => 'Pesel może zawierać maksymalnie 11 znaków',
            'city.required' => 'To pole jest wymagane',
            'city.regex' => 'To pole nie może zawierać cyfr',
            'city.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'address.required' => 'To pole jest wymagane',
            'address.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'phone.required' => 'To pole jest wymagane',
            'phone.phone' => 'To pole musi zawierać 9 znaków',
            'phon.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'postalCode.required' => 'To pole jest wymagane',
            'postalCode.postal_code' => 'Wpisz poprawny format kodu pocztowego (12-345)',
            'email.required' => 'To pole jest wymagane',
            'email.email' => 'Pole email musi być adresem poczty elektronicznej (jankowalski@example.pl)',
            'password.required' => 'To pole jest wymagane',
            'password.regex' => 'Hasło musi zawierać conajmniej jedną cyfrę oraz conajmniej jeden znak specjalny',
            'rule.required' => 'Aby się zarejestrować musisz zaakceptować regulamin'
        ]
    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => ucwords($data['name']),
            'email' => $data['email'],
            'surname' => ucwords($data['surname']),
            'pesel' => $data['pesel'],
            'city' => ucwords($data['city']),
            'address' => ucwords($data['address']),
            'postalCode' => $data['postalCode'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        $number1 = mt_rand(1000000000, 9999999999);
        $number2 = mt_rand(1000000000, 9999999999);
        $number3 = mt_rand(1000, 9999);
        $account = new Account([
            'accountNumber' => "43".$number1.$number2.$number3,
            'balance' => "0",
        ]);

        $user->account()->save($account);
        return $user;
    }
    

}
