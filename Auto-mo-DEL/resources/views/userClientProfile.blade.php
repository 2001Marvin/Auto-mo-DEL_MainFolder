<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Auto-mo-DEL | ClientProfile</title>
        <link rel = "icon" href = "./images/Auto-mo-DEL_logo3.png" type = "image/x-icon">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
        <!-- fontawesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @vite(['resources/css/clientProfile.css'])
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
                        <li><a class="dropdown-item" href="logout">log out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="clientPageMainDiv">
            <div class="container bg-light mt-5">
                <div class="row align-items-start">
                    <div class="col-md-4 leftSideDiv text-center ">
                        <div class="container">
                            <div class="leftSideHeader">
                                <img src={{ URL::to('images/defaultProfilePhoto.png') }} height="300px" alt="logo">
                                <!-- <h3><b>client:</b> Wendel Mejaran</h3> -->
                            </div>
                            <div class="leftSideBody">
                                <h3>Hired Driver History</h3>
                                <hr>
                                <div class="list-group">
                                    <div href="#" class="list-group-item list-group-item-action" aria-current="true">
                                        <div class="d-flex w-100 jd-flex flex-row align-items-center">
                                            <img src={{ URL::to('images/defaultProfilePhoto.png') }} height="60px" alt="logo">
                                            <h5 class="mb-1">Jonathan Anderson</h5>
                                            <small></small>
                                        </div>
                                        <hr>
                                        <p class="mb-1">“A very nice client.”</p>
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
                                        <p class="mb-1">“A very accomodating client.”</p>
                                        <small class="starRating">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
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
                                    <p class="mr-5">Rating as a Client</p>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star-half-stroke"></i>
                                </div>
                            </div>
                            <hr>
                            <div class="rightSideLowerDiv">
                                <table class="table mt-5 w-75 m-auto">
                                    <tbody>
                                        <h3 class="text-center">More Info</h3>
                                        <tr class="contactInfo">
                                            <th scope="row"><i class="fa-sharp fa-solid fa-phone"></i></th>
                                            <td>{{ Session::get('contactNumber') }}</td>
                                        </tr>
                                        <tr class="contactInfo">
                                            <th scope="row"><i class="fa-solid fa-envelope"></i></th>
                                            <td>{{ Session::get('email') }}</td>
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
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>