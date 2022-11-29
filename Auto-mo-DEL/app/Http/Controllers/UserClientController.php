<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userClient;

class UserClientController extends Controller
{
    //
    public function createClientAccount(Request $request)
    {
        $accType = "Client";
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
                'accountType' => $accType,
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
            // echo('<h1>Inserted Successfully</h1>');
            return redirect('login');
        }else{
            echo('<h1>ERROR INSERTION</h1>');
        }

    }
      // edit profile for client
      public function EditClient($id, Request $request){
        //return $id;
        $user=userClient::find($id); // finds user to be edited
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
