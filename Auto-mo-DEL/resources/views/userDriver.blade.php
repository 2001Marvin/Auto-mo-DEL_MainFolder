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
                            <form class="row g-3">
                            @csrf
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="inputFirstName">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="inputLastName">
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Brgy., City, Country">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="inputPassword">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="inputConfirmPassword">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputAge" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="inputAge">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputGender" class="form-label">Gender</label>
                                            <select id="inputGender" class="form-select">
                                                <option selected disabled></option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputContactNumber" class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" id="inputContactNumber">
                                </div>
                                <div class="col-md-6">
                                    <label for="formLicense" class="form-label">License</label>
                                    <input class="form-control" type="file" id="formLicense">
                                </div>
                                <div class="col-md-6">
                                    <label for="formBirthCertificate" class="form-label">Birth Certificate</label>
                                    <input class="form-control" type="file" id="formBirthCertificate">
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