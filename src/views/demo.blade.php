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
{!! GMJA::getCurrentMap("39.909078310909095,32.752862457671334",16,"tr", "hybrid", "Bul Beni", "button-123", "Konum Bulundu") !!}
</body>
</html>
