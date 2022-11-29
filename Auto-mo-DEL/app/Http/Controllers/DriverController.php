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
        $numberOfExperience = $request->input('numberOfExperience');


        // dd( $inputDriver['vehicleType']);
        // $isInsertSuccessful = userDriver::create($inputDriver);
        $availability = 1;
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
                'numberOfExperience' => $numberOfExperience,
                'availability' => $availability,
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

        $request->session()->put('firstName', $user->firstName);
        $request->session()->put('lastName', $user->lastName);
        $request->session()->put('email', $user->email);
        $request->session()->put('address', $user->address);
        $request->session()->put('age', $user->age);
        $request->session()->put('gender', $user->gender);


        return back();
    }
}

