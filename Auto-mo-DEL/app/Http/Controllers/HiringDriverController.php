<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\hiringDriver;
use DB;

class HiringDriverController extends Controller
{
    public function startHireDriver($driverId){
        // dd($driverId);
        // echo "HELLO FROM HIRE DRIVER CONTROLLER";


        //getting values
        $clientIdValue = session()->get('id');
        $driverIdValue = $driverId;
        $active = 1;

        $isInsertSuccessful = 
            hiringDriver::insert([
                'clientID' => $clientIdValue,
                'driverID' => $driverIdValue,
                'activeInd' => $active,
            ]);

        $affected = DB::table('user_drivers')
            ->where('id', $driverIdValue)
            ->update(['availability' => 0]);
            
        if($isInsertSuccessful && $affected){
            // echo('<h1>Inserted Successfully</h1>');
            return redirect('LoginClient');
        }else{
            echo('<h1>ERROR INSERTION</h1>');
        }
        
        
    }
    public function endHireDriver($driverId){
        // dd($driverId);
        // echo "HELLO FROM HIRE DRIVER CONTROLLER";


        //getting values
        $clientIdValue = session()->get('id');
        $driverIdValue = $driverId;
        $active = 1;

        $isDeleteSuccessful = DB::table('hiring_drivers')
            ->where('driverID', $driverId)
            ->delete();

        $affected = DB::table('user_drivers')
            ->where('id', $driverIdValue)
            ->update(['availability' => 1]);
            
        if($isDeleteSuccessful && $affected){
            // echo('<h1>Inserted Successfully</h1>');
            return redirect('LoginClient');
        }else{
            echo('<h1>ERROR INSERTION</h1>');
        }
        
        
    }
}
