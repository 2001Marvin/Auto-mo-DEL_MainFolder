<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\userClient;
use App\Models\userDriver;

// use Session;

class LoginController extends Controller
{
    //
    public function loginUser(Request $request)
    {
        // dd($request->inlineRadioOptions);
        $accType = $request->inlineRadioOptions;

        $request->validate([
            'inputEmail' => 'required',
            'inputPassword' => 'required',
            'inlineRadioOptions' => 'required'
        ]);

        if($accType == "driver"){
            $user = userDriver::where('email', '=', $request->inputEmail)->where('password', '=', $request->inputPassword)->first();
            if($user){
                $request->session()->put('loginId', $user->id);
                $data = array();
    
                if(Session::has('loginId')){
                    $data = userDriver::where('email', '=', $request->inputEmail)->where('password', '=', $request->inputPassword)->first();

                    // print_r($data);
                    Session::put('id', $data['id']);
                    Session::put('accountType', $data['accountType']);
                    Session::put('firstName', $data['firstName']);
                    Session::put('lastName', $data['lastName']);
                    Session::put('email', $data['email']);
                    Session::put('password', $data['password']);
                    Session::put('address', $data['address']);
                    Session::put('age', $data['age']);
                    Session::put('gender', $data['gender']);
                    Session::put('contactNumber', $data['contactNumber']);
                    Session::put('vehicleType', $data['vehicleType']);

                    return view('userDriverDashboard', compact('data'));
                }
            }
            // return redirect('login');
        }
        else{
            $user = userClient::where('email', '=', $request->inputEmail)->where('password', '=', $request->inputPassword)->first();
            if($user){
                $request->session()->put('loginId', $user->id);
                $data = array();
    
                if(Session::has('loginId')){
                    $data = userClient::where('email', '=', $request->inputEmail)->where('password', '=', $request->inputPassword)->first();
                    
                    Session::put('id', $data['id']);
                    Session::put('accountType', $data['accountType']);
                    Session::put('firstName', $data['firstName']);
                    Session::put('lastName', $data['lastName']);
                    Session::put('email', $data['email']);
                    Session::put('password', $data['password']);
                    Session::put('address', $data['address']);
                    Session::put('age', $data['age']);
                    Session::put('gender', $data['gender']);
                    Session::put('contactNumber', $data['contactNumber']);
                    Session::put('vehicleType', $data['vehicleType']);
                    
                    return view('userClientDashboard', compact('data'));
                }
            }
            return redirect()->back()->with('error', 'Incorrect Credentials' );
        }
    }

    public function logoutUser(Request $request)
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
