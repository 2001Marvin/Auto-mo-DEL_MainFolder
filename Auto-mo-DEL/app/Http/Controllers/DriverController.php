<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userDriver;

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
}
