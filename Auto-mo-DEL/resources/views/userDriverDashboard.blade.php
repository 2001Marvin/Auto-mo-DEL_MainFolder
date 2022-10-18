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
                        {{ $data->firstName }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout">log out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="driverPageMainDiv">
            <div class="container mt-5">
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
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>