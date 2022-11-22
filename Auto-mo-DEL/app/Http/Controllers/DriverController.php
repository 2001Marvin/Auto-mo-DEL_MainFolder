<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\UserDriver;

class DriverController extends Controller
{
    public function createDriverAccount(Request $request){
        
        // dd($request['vehicleType']);
        // $inputDriver = $request->all();
        $accType = "Driver";
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $address = $request->input('address');
        $password = $request->input('password');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $contactNumber = $request->input('contactNumber');
        $license = $request->input('license');
        $birthCertificate = $request->input('birthCertificate');
        $vehicleType = implode(',',$request->input('vehicleType'));


        // dd( $inputDriver['vehicleType']);
        // $isInsertSuccessful = userDriver::create($inputDriver);

        $isInsertSuccessful = 
            userDriver::insert([
                'accountType' => $accType,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'address' => $address,
                'password' => $password,
                'age' => $age,
                'gender' => $gender,
                'contactNumber' => $contactNumber,
                'license' => $license,
                'birthCertificate' => $birthCertificate,
                'vehicleType' => $vehicleType,
            ]);

            
        if($isInsertSuccessful){
            // echo('<h1>Inserted Successfully</h1>');
            return redirect('login');
        }else{
            echo('<h1>ERROR INSERTION</h1>');
        }
    }
    // edit profile for driver
    public function EditDriver($id, Request $request){
        //return $id;
        $user=UserDriver::find($id); // finds user to be edited
        $user->fill($request->except(['id']));
        $user->save();

        Session::flush();

        Session::put('id', $user->id);
        Session::put('accountType', $user->accountType);
        Session::put('firstName', $user->firstName);
        Session::put('lastName', $user->lastName);
        Session::put('email', $user->email);
        Session::put('password', $user->password);
        Session::put('address', $user->address);
        Session::put('age', $user->age);
        Session::put('gender', $user->gender);
        Session::put('contactNumber', $user->contactNumber);
        Session::put('vehicleType', $user->vehicleType);

        if($user){


            return redirect('DriverProfile');
        }
    }
}

