<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Auto-mo-DEL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
        @vite(['resources/css/registrationBridge.css'])
    </head>
    <body>
        <div class="container mainDiv">
            <div class="imageHeaderDiv">
                    <img class="mt-5" src={{ URL::to('images/Auto-mo-DEL_logo.png') }} height="200px" alt="logo">
                    <h3 class="logoName">Auto-mo-DEL</h3>
            </div>
            <div class="bridgeBtnDiv">
                <div class="bridgeBtn">
                    <a class="bridgeBtnLink" href="">Register as Client</a>
                </div>
                <div class="bridgeBtn">
                    <a class="bridgeBtnLink" href="{{ url('/DriverRegistration') }}">Register as Driver</a>
                </div>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>