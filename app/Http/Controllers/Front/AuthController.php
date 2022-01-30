<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Model\Client;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function register()
    {
       return view('front.register');
    }
    public function registerSave(Request $request)
    {
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'date' => 'required',
            'blood_type' => 'required',
            'governorate_id' => 'required',
            'city_id' => 'required',
            'phone' => 'required',
            'donation_date' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];

        $this->validate($request, $rule);
        $client = Client::create($request->all());

        $client->save();


        return view('front.login');

    }
    public function login()
    {
        return view('front.login');
    }
    public function loginSave(Request $request)
    {

    }

}
