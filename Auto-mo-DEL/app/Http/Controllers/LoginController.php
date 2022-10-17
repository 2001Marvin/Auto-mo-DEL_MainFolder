<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userClient;
use App\Models\userDriver;
use Session;

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

                    return view('userDriverDashboard', compact('data'));
                }
            }
            return redirect('login');
        }
        else{
            $user = userClient::where('email', '=', $request->inputEmail)->where('password', '=', $request->inputPassword)->first();
            if($user){
                $request->session()->put('loginId', $user->id);
                $data = array();
    
                if(Session::has('loginId')){
                    $data = userClient::where('email', '=', $request->inputEmail)->where('password', '=', $request->inputPassword)->first();

                    return view('userClientDashboard', compact('data'));
                }
            }
            return redirect('login');
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
