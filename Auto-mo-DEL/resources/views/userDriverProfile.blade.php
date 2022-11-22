<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Auto-mo-DEL | DriverProfile</title>
        <link rel = "icon" href = "./images/Auto-mo-DEL_logo3.png" type = "image/x-icon">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
        <!-- fontawesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @vite(['resources/css/driverProfile.css'])
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
                    {{ Session::get('firstName') }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout">Log-out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="driverPageMainDiv">
            <div class="container bg-light mt-5">
                <div class="row align-items-start">
                    <div class="col-md-4 leftSideDiv text-center ">
                        <div class="container">
                            <div class="leftSideHeader">
                                <img src={{ URL::to('images/defaultProfilePhoto.png') }} height="300px" alt="logo">
                                <!-- <h3><b>Driver:</b> Wendel Mejaran</h3> -->
                            </div>
                            <div class="leftSideBody">
                                <h3>Job History</h3>
                                <hr>
                                <div class="list-group">
                                    <div href="#" class="list-group-item list-group-item-action" aria-current="true">
                                        <div class="d-flex w-100 jd-flex flex-row align-items-center">
                                            <img src={{ URL::to('images/defaultProfilePhoto.png') }} height="60px" alt="logo">
                                            <h5 class="mb-1">Jonathan Anderson</h5>
                                            <small></small>
                                        </div>
                                        <hr>
                                        <p class="mb-1">“The driver was kind and drove really good”</p>
                                        <small class="starRating">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </small>
                                    </div>
                                    <div href="#" class="list-group-item list-group-item-action" aria-current="true">
                                        <div class="d-flex w-100 jd-flex flex-row align-items-center">
                                            <img src={{ URL::to('images/defaultProfilePhoto.png') }} height="60px" alt="logo">
                                            <h5 class="mb-1">Jonathan Anderson</h5>
                                            <small></small>
                                        </div>
                                        <hr>
                                        <p class="mb-1">“Very efficient but sometimes do not know how to slow down”</p>
                                        <small class="starRating">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star-half-stroke"></i>
                                            <i class="fa-regular fa-star-half-stroke"></i>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 RightSideDiv">
                        <div class="container">
                            <div class="righSideUpperDiv">
                                <h1>{{ Session::get('firstName') }} {{ Session::get('lastName') }} ({{ Session::get('accountType') }})</h1>
                                <h5>{{ Session::get('address') }}</h5>
                                <div class="overallStarRating">
                                    <p class="mr-5">Overall Rating From Past Jobs:</p>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star-half-stroke"></i>
                                </div>
                                <button type="button" class="btn btn-primary" style="background-color:#1AEBB6; border-color: #e7e7e7;" id="editBtn" data-toggle="modal" data-target="#editModal">
                                    Edit Profile
                                </button>
                                <div class="contactInfo">
                                    <div class="mobileNum d-flex justify-content-end">
                                        <i class="fa-sharp fa-solid fa-phone"></i>
                                        <p>{{ Session::get('contactNumber') }}</p>
                                    </div>
                                    <div class="email d-flex justify-content-end">
                                        <i class="fa-solid fa-envelope"></i>
                                        <p>{{ Session::get('email') }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="rightSideLowerDiv">
                                <table class="table mt-5 w-75 m-auto">
                                    <tbody>
                                        <tr>
                                            <th scope="row">License</th>
                                            <td>Professional</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Vehicle Type</th>
                                            <td>{{ Session::get('vehicleType') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Age</th>
                                            <td>{{ Session::get('age') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Gender</th>
                                            <td>{{ Session::get('gender') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                        

                        <!-- Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                </div>
                                <form action="{{url('api/DriverProfile/edit/'.Session::get('id'))}}" method="post">
                                    <div class="modal-body">
                                    
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="First Name">First Name:</label>
                                                <input type="text" class="form-control" name="firstName" id="firstName" value={{Session::get('firstName')}}>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="Last Name">Last Name</label>
                                                    <input type="text" class="form-control" name="lastName" id="lastName" value={{Session::get('lastName')}}>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="Address">Address:</label>
                                                    <input type="text" class="form-control" name="address" id="address" value={{Session::get('address')}}>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                <label for="Contact Number">Contact Number:</label>
                                                <input type="text" class="form-control" name="contactNumber" id="contactNumber" value={{Session::get('contactNumber')}}>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                <label for="Email">Email:</label>
                                                <input type="text" class="form-control" name="email" id="email" value={{Session::get('email')}}>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                <label for="Age">Age:</label>
                                                <input type="text" class="form-control" name="age" id="age" value={{Session::get('age')}}>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                <label for="Gender">Gender:</label>
                                                <input type="text" class="form-control" name="gender" id="gender" value={{Session::get('gender')}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Close</button>
                                        <button type="submit" class="btn btn-primary"style="background-color:#1AEBB6; border-color: #e7e7e7;">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $("#editBtn").click(function() {
                $("#editModal").modal('show');
            });
            $("#closeModal").click(function() {
                $("#editModal").modal('hide');
            });
        </script>
    </body>
</html>