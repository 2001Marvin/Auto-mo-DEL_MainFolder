<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userClient;

class UserClientController extends Controller
{
    //
    public function createClientAccount(Request $request){
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $address = $request->input('address');
        $password = $request->input('password');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $contactNumber = $request->input('contactNumber');
        $identification = $request->input('identification');

        $isInsertSuccessful = 
            userClient::insert([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'address' => $address,
                'password' => $password,
                'age' => $age,
                'gender' => $gender,
                'contactNumber' => $contactNumber,
                'identification' => $identification,
            ]);

            
        if($isInsertSuccessful){
            echo('<h1>Inserted Successfully</h1>');
        }else{
            echo('<h1>ERROR INSERTION</h1>');
        }
    }
     
}
