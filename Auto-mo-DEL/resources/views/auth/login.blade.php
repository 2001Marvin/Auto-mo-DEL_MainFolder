<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Auto-mo-DEL | Login</title>
        <link rel = "icon" href = "./images/Auto-mo-DEL_logo3.png" type = "image/x-icon">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
        @vite(['resources/css/loginPage.css'])
    </head>
    <body>
            <div class="container main-div my-5">
                <div class="row">
                    <div class="col left-div"><!-- Logo div -->
                        <a href="/"><img src={{ URL::to('images/Auto-mo-DEL_logo2.png') }} height="30%" alt="logo"></a> <!-- mao ni sa logo todd -->
                    </div>
                    <div class="col right-div"><!-- form div -->
                        <h2 class="text-center">LOGIN</h2>
                        <br>
                        <div class="container">
                            <form class="row g-3" action="loginUser" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="inputEmail">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" name="inputPassword">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radioClient" value="client">
                                    <label class="form-check-label" for="radioClient">Client</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radioDriver" value="driver">
                                    <label class="form-check-label" for="radioDriver">Driver</label>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">LOGIN</button>
                                </div>
                            </form>
                            <div class="signup">
                                <p class="text-center">Do Not Have An Account Yet?<a href="{{ url('/Registration') }}">Sign Up</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
