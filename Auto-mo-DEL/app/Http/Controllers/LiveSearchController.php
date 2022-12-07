<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\userClient;
use App\Models\userDriver;
use App\Models\hiringDriver;
use DB;


class LiveSearchController extends Controller
{
    function index()
    {
        return view('userClientDashboard');
    }
    
    function getDrivers(Request $request)
    {
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('user_drivers')
                    ->where('firstName', 'like', '%'.$query.'%')
                        ->where(function($query){
                            $query->where('availability', '=','1');
                        })
                    ->orWhere('lastName', 'like', '%'.$query.'%')
                        ->where(function($query){
                            $query->where('availability', '=','1');
                        })
                    ->orWhere('address', 'like', '%'.$query.'%')
                        ->where(function($query){
                            $query->where('availability', '=','1');
                        })
                    ->orWhere('vehicleType', 'like', '%'.$query.'%')
                        ->where(function($query){
                            $query->where('availability', '=','1');
                        })
                    ->orderBy('id', 'asc')
                    ->get();
            }
            else{
                $data = DB::table('user_drivers')
                    ->where('availability', '=','1')
                    ->orderBy('id', 'asc')
                    ->get();
            }

            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row)
                {
                    $row->vehicleType = explode(',', $row->vehicleType);
                    $output .= '
                    <div class="col">
                        <div class="card">
                            <div class="carHeader py-2">
                                <img src="images/defaultProfilePhoto.png" class="rounded float-start" height="100px" alt="...">
                                <div class="carHeader">
                                    <h5 class="card-title">'.$row->firstName.' '.$row->lastName.'</h5>
                                    <p class="card-title" style="color:#A3A3AF">'.$row->address.'</p>
                                    <span class="availability1">AVAILABLE</span>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <p style="color:#A3A3AF">VEHICLE TYPE</p>
                                <div class="vehicleTypeDiv">';
                                    foreach($row->vehicleType as $value)
                                    {
                                        $output .= '<span class="vehicleTypeSmallDiv">'.$value.'</span>';
                                    }
                    $output .=  '</div>
                                 <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><i class="fa-solid fa-car"></i> '.$row->numberOfExperience.' Years Of Experience</td>
                                            <td><i class="fa-solid fa-sack-dollar"></i> 1,500 Pesos/Day</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn invitationBtn" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row->id.'">
                                    Invite for a Job
                                    </button>
                                </div>
                                
                            </div>
                        </div>
                    </div>



                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal'.$row->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="container text-center ">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="images/defaultProfilePhoto.png" class="rounded float-start" height="200px" alt="...">
                                            </div>
                                            <div class="col-8 text-start my-3 modalHeader">
                                                <div class="d-flex">
                                                    <h1 class="modal-title fs-1" id="exampleModalLabel">'.$row->firstName.' '.$row->lastName.'</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <h3 class="modal-title fs-4">'.$row->accountType.'<h3>
                                                <h2 class="modal-title fs-5"><i class="fa-solid fa-location-dot"></i> '.$row->address.'<h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Years Of Experience</th>
                                                    <td>'.$row->numberOfExperience.' Years</td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">Salary Rate</th>
                                                    <td>1,500 Pesos/Day</td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">About Self</th>
                                                    <td>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s 
                                                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a 
                                                        type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining 
                                                        essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                                                        and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/startHireDriver/'.$row->id.'" class="btn modal-HireBtn">Hire Driver</a>
                                </div>
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
            return view('userClientDashboard');
        }
    }

    function getHiredDrivers(Request $request)
    {
        if($request->ajax()){
            $clientIdValue = session()->get('id');
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('hiring_drivers')
                    ->join('user_clients', 'hiring_drivers.clientID', '=', 'user_clients.id')
                    ->join('user_drivers', 'user_drivers.id', '=', 'hiring_drivers.driverID')
                    ->where('hiring_drivers.clientID','=',$clientIdValue)
                    ->orWhere('firstName', 'like', '%'.$query.'%')
                        ->where(function($query){
                            $query->where('availability', '=','0');
                        })
                    ->orWhere('lastName', 'like', '%'.$query.'%')
                        ->where(function($query){
                            $query->where('availability', '=','0');
                        })
                    ->orWhere('address', 'like', '%'.$query.'%')
                        ->where(function($query){
                            $query->where('availability', '=','0');
                        })
                    ->orWhere('vehicleType', 'like', '%'.$query.'%')
                        ->where(function($query){
                            $query->where('availability', '=','0');
                        })
                    ->orderBy('hiring_drivers.id', 'asc')
                    ->get();
            }
            else{
                //SELECT * 
                //FROM `hiring_drivers` 
                //INNER JOIN `user_clients` 
                //  ON user_clients.id = hiring_drivers.clientID 
                //INNER JOIN `user_drivers` 
                //  ON user_drivers.id = hiring_drivers.driverID
                $data = DB::table('hiring_drivers')
                    ->join('user_clients', 'hiring_drivers.clientID', '=', 'user_clients.id')
                    ->join('user_drivers', 'user_drivers.id', '=', 'hiring_drivers.driverID')
                    ->where('hiring_drivers.clientID','=',$clientIdValue)
                    ->orderBy('hiring_drivers.id', 'asc')
                    ->get();
            }

            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row)
                {
                    $row->vehicleType = explode(',', $row->vehicleType);
                    $output .= '
                    <div class="col">
                        <div class="card">
                            <div class="carHeader py-2">
                                <img src="images/defaultProfilePhoto.png" class="rounded float-start" height="100px" alt="...">
                                <div class="carHeader">
                                    <h5 class="card-title">'.$row->firstName.' '.$row->lastName.'</h5>
                                    <p class="card-title" style="color:#A3A3AF">'.$row->address.'</p>
                                    <span class="availability2">UNDER JOB CONTRACT</span>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <p style="color:#A3A3AF">VEHICLE TYPE</p>
                                <div class="vehicleTypeDiv">';
                                    foreach($row->vehicleType as $value)
                                    {
                                        $output .= '<span class="vehicleTypeSmallDiv">'.$value.'</span>';
                                    }
                    $output .=  '</div>
                                 <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><i class="fa-solid fa-car"></i> '.$row->numberOfExperience.' Years Of Experience</td>
                                            <td><i class="fa-solid fa-sack-dollar"></i> 1,500 Pesos/Day</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <a href="/endHireDriver/'.$row->id.'" class="btn invitationBtn">End Job Contract</a>
                                </div>
                                
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
                'table_data_Hired' => $output,
                'total_data_Hired' => $total_row
            );
            echo json_encode($data);
        }else{
            return view('userClientDashboard');
        }

    }
}
