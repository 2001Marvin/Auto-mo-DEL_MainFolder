<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userDriver;

class DriverController extends Controller
{
    public function createDriverAccount(Request $request){
        
        // dd($request['vehicleType']);
        $inputDriver = $request->all();
        $inputDriver['vehicleType'] = implode(',',$request->input('vehicleType'));


        // dd( $inputDriver['vehicleType']);
        $isInsertSuccessful = userDriver::create($inputDriver);

            
        if($isInsertSuccessful){
            echo('<h1>Inserted Successfully</h1>');
        }else{
            echo('<h1>ERROR INSERTION</h1>');
        }
    }
}
