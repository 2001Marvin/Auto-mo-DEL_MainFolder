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
        $active = 0;

        $isInsertSuccessful = 
            hiringDriver::insert([
                'clientID' => $clientIdValue,
                'driverID' => $driverIdValue,
                'activeInd' => $active
            ]);
            
        if($isInsertSuccessful){
            // echo('<h1>Inserted Successfully</h1>');
            return redirect('LoginClient');
        }else{
            echo('<h1>ERROR INSERTION</h1>');
        }
        
        
    }
    public function endHireDriver($driverId, $id){
        // dd($driverId);
        // echo "HELLO FROM HIRE DRIVER CONTROLLER";


        //getting values
        $clientIdValue = session()->get('id');
        $driverIdValue = $driverId;
        $active = 1;

        $isDeleteSuccessful = DB::table('hiring_drivers')
            ->where('id', $id)
            ->delete();

        $affected = DB::table('user_drivers')
            ->where('id', $driverIdValue)
            ->update(['availability' => 1]);
            
        // echo('<h1>Inserted Successfully</h1>');
        return redirect('LoginClient');
    }

    public function acceptJobDriver($id){
        $driverIdValue = session()->get('id');
        $isPending = false;

        $hiring_driver = DB::table('hiring_drivers')
        ->where('id', $id)
        ->update(['activeInd' => 1, 'isPending' => false]);

        $affected = DB::table('user_drivers')
            ->where('id', $driverIdValue)
            ->update(['availability' => 0]);

        // echo('<h1>Inserted Successfully</h1>');
        return redirect('LoginDriver');
    }
    public function declineJobDriver($id){
        $isPending = false;

        $isDeleteSuccessful = DB::table('hiring_drivers')
            ->where('id', $id)
            ->delete();

        // echo('<h1>Inserted Successfully</h1>');
        return redirect('LoginDriver');
    }
    public function endJobDriver($id){
        // dd($driverId);
        // echo "HELLO FROM HIRE DRIVER CONTROLLER";


        //getting values
        $driverIdValue = session()->get('id');
        $active = 1;

        $isDeleteSuccessful = DB::table('hiring_drivers')
            ->where('id', $id)
            ->delete();

        $affected = DB::table('user_drivers')
            ->where('id', $driverIdValue)
            ->update(['availability' => 1]);
            
        // echo('<h1>Inserted Successfully</h1>');
        return redirect('LoginDriver');
    }
}
