<!DOCTYPE html>
<html>
<head>
    <title>Demo Map</title>
    <style>
        .gmja-map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
{!! GMJA::getMap("39.909078310909095,32.752862457671334",16,"Nano Medya", "https://voronezh.samosval.ru/img/map2.png","tr") !!}
</body>
</html>
