<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Auto-mo-DEL | Registration</title>
        <link rel = "icon" href = "./images/Auto-mo-DEL_logo3.png" type = "image/x-icon">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
        @vite(['resources/css/registrationBridge.css'])
    </head>
    <body>
        <div class="container mainDiv">
            <div class="imageHeaderDiv">
                    <a href="/"><img src={{ URL::to('images/Auto-mo-DEL_logo2.png') }} height="300px" alt="logo"></a>
                    <!-- <h3 class="logoName">Auto-mo-DEL</h3> -->
            </div>
            <div class="bridgeBtnDiv">
                <div class="bridgeBtn">
                    <a class="bridgeBtnLink" href="{{ url('/ClientRegistration') }}">Register as Client</a>
                </div>
                <div class="bridgeBtn">
                    <a class="bridgeBtnLink" href="{{ url('/DriverRegistration') }}">Register as Driver</a>
                </div>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>