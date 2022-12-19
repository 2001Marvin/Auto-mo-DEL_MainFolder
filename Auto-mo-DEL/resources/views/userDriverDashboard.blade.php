<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Auto-mo-DEL | DriverDashboard</title>
        <link rel = "icon" href = "./images/Auto-mo-DEL_logo3.png" type = "image/x-icon">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
        @vite(['resources/css/driverDashboard.css'])
    </head>
    <body>
        <nav class="navbar mainNavBar">
            <div class="navDiv">
                <a class="navbar-brand" href="#">
                    <img src={{ URL::to('images/Auto-mo-DEL_logo3.png') }} height="80px" alt="logo">
                    <img src={{ URL::to('images/Auto-mo-DEL_CompanyName.png') }} height="80px" alt="logo">
                </a>
            </div>
            <div class="accountDiv">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php 
                            session_start();
                            echo session()->get('firstName');
                        ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout">log out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="driverPageMainDiv">
            <div class="container mt-5">
                <div class="list-group border">
                        <div class="d-flex w-100 justify-content-between">
                            <h2 class="mb-1">
                                <?php 
                                    echo ('Hello, '.session()->get('firstName').' '.session()->get('lastName'));
                                ?>
                            </h2>
                            <small>Auto-mo-DEL</small>
                        </div>
                        <hr>

                        <p><b class="totalDrivers">Pending Offers from Clients:</b></p>
                        <div class="row row-cols-2 row-cols-md-3 g-4">
                            @foreach($pending as $item)
                            <div class="col">
                                <div class="card">
                                    <div class="carHeader py-2">
                                        <img src="images/defaultProfilePhoto.png" class="rounded float-start" height="100px" alt="...">
                                        <div class="carHeader">
                                            <h5 class="card-title">{{$item->firstName}} {{$item->lastName}}</h5>
                                            <p class="card-title" style="color:#A3A3AF">{{$item->address}}</p>
                                            <p class="card-title" style="color:#A3A3AF">{{$item->contactNumber}}</p>
                                            <span class="availability2">PENDING</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <a href="/acceptJobDriver/{{$item->hire_id}}" class="btn btn-info">Accept Job</a>
                                            <a href="/endJobDriver/{{$item->hire_id}}" class="btn btn-danger">Decline Job</a>
                                        </div>      
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <p><b class="totalDrivers">On-going Jobs from Clients:</b></p>
                        <div class="row row-cols-2 row-cols-md-3 g-4">
                            @foreach($accepted as $item)
                            <div class="col">
                                <div class="card">
                                    <div class="carHeader py-2">
                                        <img src="images/defaultProfilePhoto.png" class="rounded float-start" height="100px" alt="...">
                                        <div class="carHeader">
                                            <h5 class="card-title">{{$item->firstName}} {{$item->lastName}}</h5>
                                            <p class="card-title" style="color:#A3A3AF">{{$item->address}}</p>
                                            <p class="card-title" style="color:#A3A3AF">{{$item->contactNumber}}</p>
                                            <span class="availability2">ON-GOING</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <a href="/endJobDriver/{{$item->hire_id}}" class="btn btn-info">End Job</a>
                                        </div>      
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                            
                        
                        {{-- <small>Auto-mo-DEL Official Webpage</small> --}}
                        <a href="{{ url('/DriverProfile') }}" class="m-2 d-flex flex-row-reverse">proceed to MyProfile >>></a>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>