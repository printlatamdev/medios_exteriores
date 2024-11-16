<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medios externos</title>
    <style>
        @page {
            margin: 0cm 0cm;
            padding: 0cm 0cm;
        }
        body {
            font-family: "Montserrat", sans-serif;
            margin-top: 0cm;
            padding-top: 0cm;
            margin-left: 0cm;
            margin-right: 0cm;
            margin-bottom: 0cm;
        }

        .firstPage {
            background-image: url('assets/images/media/0.jpg');
            background-size: 100% 100%;
            background-position: fixed;
            height: 100% !important;
        }

        .secondPage {
            background-image: url('assets/images/media/2.png');
            background-size: 100% 100%;
            background-position: fixed;
            height: 100% !important;
        }

        .mainLogo {
            width: 350px;
            height: 200px;
            padding: 10px 25px;
        }

        .divImage {
            position: -webkit-sticky !important;
            position: sticky !important;
            bottom: 0 !important;
        }

        .mediaImage {
            width: 100%;
            height: 75%;
        }

        .footerImage {
            background-image: url('assets/images/media/5.png');
            background-size: 100% 100%;
            background-position: fixed;
            padding: 0px;
            margin-left: 0px !important;
            width: 100%;
            height: 25%;
        }

        .infoFooter {
            color: white;
            margin-bottom: 1px;
        }

        .addressLogo {
            width: 30px;
            height: 30px;
            margin-top: 3px !important;
        }

        .listContainer {
            color: white;
        }
        .logoCDFooter{
            width: 75%;
            height: 100px;
            display: block;
            margin: 0 auto;
        }
        ul li {
            list-style: none;
        }
        .mainTable {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="firstPage">
        <div class="divImage">
            <img src="{{ public_path('assets/images/media/1.png') }}" alt="logo" class="mainLogo">
        </div>
    </div>
    <div class="secondPage">
        <div class="divImage">
            lorem
        </div>
    </div>
    <div>
        @foreach ($records as $item)
            <div>
                <img src="{{ public_path('storage/' . $item->gallery[0]) }}" alt="logo" class="mediaImage">
                <div class="footerImage">
                    <div class="infoFooter">
                        <h4>
                            <span>
                                <img src="{{ public_path('assets/images/media/7.png') }}" alt="logo"
                                    class="addressLogo"></span>
                            {{ $item->address }}
                        </h4>
                    </div>
                    <div class="listContainer">
                        <table class="mainTable">
                            <tr>
                                <td style="width: 80%">
                                    <ul>
                                        <li>-Medida de la Valla: {{ $item->width }} X {{ $item->height }}</li>
                                        <li>-Flujo Vehícular: {{ $item->traffic_flow }}</li>
                                        <li>-Iluminación {{ $item->lighting }}</li>
                                    </ul>
                                </td>
                                <td style="width: 20%">
                                    <img src="{{ public_path('assets/images/media/1.png') }}" alt="logo" class="logoCDFooter">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                {{ $item }}
            </div>
        @endforeach
    </div>
</body>

</html>
