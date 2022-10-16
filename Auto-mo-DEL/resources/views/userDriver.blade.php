<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Auto-mo-DEL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
        @vite(['resources/css/userDriverRegistration.css'])
    </head>
    <body>
        <!-- <div class="container main-div"> -->
            <div class="container main-div my-5">
                <div class="row">
                    <div class="col left-div">
                            <img src={{ URL::to('images/Auto-mo-DEL_logo.png') }} height="30%" alt="logo">
                    </div>
                    <div class="col right-div">
                        <h3 class="text-center">Driver Registration</h3>
                        <hr>
                        <div class="container">
                            <form class="row g-3" action="createDriverAccount" method="POST">
                            @csrf
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName">
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Brgy, City, Country">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="inputConfirmPassword">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="iae" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="age" name="age">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select id="gender" name="gender" class="form-select">
                                                <option selected disabled></option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="contactNumber" class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" id="contactNumber" name="contactNumber">
                                </div>
                                <div class="col-md-6">
                                    <label for="license" class="form-label">License</label>
                                    <input class="form-control" type="file" id="license" name="license">
                                </div>
                                <div class="col-md-6">
                                    <label for="birthCertificate" class="form-label">Birth Certificate</label>
                                    <input class="form-control" type="file" id="birthCertificate" name="birthCertificate">
                                </div>
                                <div class="col-md-12">
                                    <label for="license" class="form-label">Vehicle Type</label>
                                    <div class="container "> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <input class="form-check-input me-1" type="checkbox" name="vehicleType[]" value="A" id="vehicleRestrictionsCheckbox1">
                                                        <label class="form-check-label stretched-link" for="vehicleRestrictionsCheckbox1">A  => Motorcycle</label>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <input class="form-check-input me-1" type="checkbox" name="vehicleType[]" value="B" id="vehicleRestrictionsCheckbox2">
                                                        <label class="form-check-label stretched-link" for="vehicleRestrictionsCheckbox2">B  => Sendan</label>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <input class="form-check-input me-1" type="checkbox" name="vehicleType[]" value="B1" id="vehicleRestrictionsCheckbox3">
                                                        <label class="form-check-label stretched-link" for="vehicleRestrictionsCheckbox3">B1 => SUV / Pick Up / Van</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <input class="form-check-input me-1" type="checkbox" name="vehicleType[]" value="B2" id="vehicleRestrictionsCheckbox4">
                                                        <label class="form-check-label stretched-link" for="vehicleRestrictionsCheckbox4">B2 => 6 Wheeler-Truck</label>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <input class="form-check-input me-1" type="checkbox" name="vehicleType[]" value="C1" id="vehicleRestrictionsCheckbox5">
                                                        <label class="form-check-label stretched-link" for="vehicleRestrictionsCheckbox5">C1 => 10 Wheeler-Truck</label>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <input class="form-check-input me-1" type="checkbox" name="vehicleType[]" value="C2" id="vehicleRestrictionsCheckbox6">
                                                        <label class="form-check-label stretched-link" for="vehicleRestrictionsCheckbox6">C2 => 18 Wheeler-Truck</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>