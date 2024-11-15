<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Medios externos</title>
        <style>
            body{

            }
            .firstPage{
                background-image: url("{{ asset('assets/images/media/0.jpg') }}");
                background-size: cover;
                background-position: fixed;
            }
        </style>
    </head>
    <body>
        <div class="firstPage">
            {{ $records }}
        </div>
    </body>
</html>