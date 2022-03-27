<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Japan Information App</title>
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="/js/app.js" defer></script>
    </head>
    <body >
        <div class="main">
            <div class="header">
                Japan Travel information
            </div>
            <div class='nav'>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Travel Destinations</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="getWeather?city=Tokyo&country=JP">Tokyo</a></li>
                        <li><a class="dropdown-item" href="getWeather?city=Yokohama&country=JP">Yokohama</a></li>
                        <li><a class="dropdown-item" href="getWeather?city=Kyoto&country=JP">Kyoto</a></li>
                        <li><a class="dropdown-item" href="getWeather?city=Osaka&country=JP">Osaka</a></li>
                        <li><a class="dropdown-item" href="getWeather?city=Sapporo&country=JP">Sapporo</a></li>
                        <li><a class="dropdown-item" href="getWeather?city=Nagoya&country=JP">Nagoya</a></li>
                    </ul>
                </li>
            </div>
                    
            <div id="app">
                <div >
                    <div><weather-app></weather-app></div>    
                    <div><placeinfo-app></placeInfo-app></div>
                </div>
            </div>
        </div>
    </body>
</html>
