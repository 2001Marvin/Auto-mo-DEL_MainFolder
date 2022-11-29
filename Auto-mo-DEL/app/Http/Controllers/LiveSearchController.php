<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearchController extends Controller
{
    function index()
    {
        return view('livesearch');
    }
    
    function getDrivers(Request $request)
    {
        if($request->ajax()){

            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('user_drivers')
                    ->where('firstName', 'like', '%'.$query.'%')
                    ->orderBy('id', 'asc')
                    ->get();
            }
            else{
                $data = DB::table('user_drivers')
                    ->orderBy('id', 'asc')
                    ->get();
            }

            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row)
                {
                    $output .= '
                    <div class="col">
                        <div class="card">
                            <div class="py-2">
                                <img src="images/defaultProfilePhoto.png" class="rounded float-start" height="100px" alt="...">
                                <div>
                                    <h5 class="card-title">'.$row->firstName.' '.$row->lastName.'</h5>
                                    <p class="card-title">'.$row->address.'</p>
                                </div>
                                
                            </div>
                            <hr>
                            <div class="card-body">
                                <h5 class="card-title">'.$row->vehicleType.'</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
            else{
                $output = '
                    <tr>
                        <td align="center" colspan="4">NO DATA FOUND</td>
                    </tr>
                ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );
            echo json_encode($data);
        }else{
            return view('userDriverDashboard');
        }
    }
}
