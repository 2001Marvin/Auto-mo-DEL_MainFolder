<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Auto-mo-DEL | ClientDashboard</title>
        <link rel = "icon" href = "./images/Auto-mo-DEL_logo3.png" type = "image/x-icon">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <!-- fontawesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        @vite(['resources/css/clientDashboard.css'])
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
                        {{ $data->firstName }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="ClientProfile">Profile</a></li>
                        <li><a class="dropdown-item" href="logout">log out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="driverPageMainDiv">
            <!-- <div class="container mt-5">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action mt-5" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h2 class="mb-1">Hello, {{ $data->firstName }} {{ $data->lastName }}</h2>
                            <small>Auto-mo-DEL</small>
                        </div>
                        <hr>
                        <h6 class="mb-1">Welcome to Driver Dashboard Page</h6>
                        <small>Auto-mo-DEL Official Webpage</small>
                    </a>
                </div>
            </div> -->

            <div class="container my-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">List Of Drivers</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="hired-tab" data-bs-toggle="tab" data-bs-target="#hired-tab-pane" type="button" role="tab" aria-controls="hired-tab-pane" aria-selected="false">Hired Drivers</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="container py-3 searchContainer">
                            <div class="driverPageMainDivHeader">
                                <div class="row">
                                    <div class="col">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="searchBtn" id="searchBtn" class="form-control" placeholder="First Name / Last Name / Address" aria-label="Last name">
                                    </div>
                                </div>
                            </div>
                            <p class="totalDrivers"><span id="total_records"></span> Total Drivers</p>
                            
                            <hr class="breaker">
                            <div class="clientPageMainDivBody">
                            
                            <div class="row row-cols-2 row-cols-md-3 g-4 driverCardDeck">
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hired-tab-pane" role="tabpanel" aria-labelledby="hired-tab" tabindex="0">
                        <div class="container py-3 searchContainer_Hired">
                            <div class="driverPageMainDivHeader_Hired">
                                <div class="row">
                                    <div class="col">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="searchBtn_Hired" id="searchBtn_Hired" class="form-control" placeholder="First Name / Last Name / Address" aria-label="Last name">
                                    </div>
                                </div>
                            </div>
                            <p class="totalDrivers"><span id="total_records_Hired"></span> Total Hired Drivers</p>
                            
                            <hr class="breaker">
                            <div class="clientPageMainDivBody_Hired">
                            
                            <div class="row row-cols-2 row-cols-md-3 g-4 driverCardDeck_Hired">
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
        <script>
            $(document).ready(function(){

                fetch_drivers_data();

                function fetch_drivers_data(query='')
                {
                    // alert("load data = " + query);
                    $.ajax({
                        url:"{{ route('getDrivers') }}",
                        method: 'GET',
                        data: {query: query},
                        dataType: 'json',
                        success: function(data)
                        {
                            
                            $('.driverCardDeck').html(data.table_data);
                            $('#total_records').text(data.total_data);
                            // console.log(data);
                        }
                    })
                }

                $(document).on('keyup','#searchBtn', function(){
                    var query = $(this).val();
                    fetch_drivers_data(query);
                })

                fetch_hired_drivers_data();

                function fetch_hired_drivers_data(query='')
                {
                    // alert("load data = " + query);
                    $.ajax({
                        url:"{{ route('getHiredDrivers') }}",
                        method: 'GET',
                        data: {query: query},
                        dataType: 'json',
                        success: function(data)
                        {
                            $('.driverCardDeck_Hired').html(data.table_data_Hired);
                            $('#total_records_Hired').text(data.total_data_Hired);
                            console.log(data.total_data_Hired);
                        }
                    })
                }

            });
        </script>

    </body>
    
</html>