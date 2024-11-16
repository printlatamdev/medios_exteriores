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
            height: 70%;
        }

        .footerImage {
            background-image: url('assets/images/media/5.png');
            background-size: 100% 100%;
            background-position: fixed;
            padding: 0px;
            margin-left: 0px !important;
            width: 100%;
            height: 30%;
        }

        .infoFooter {
            color: white;
        }

        .addressLogo {
            width: 30px;
            height: 25px;
            margin-top: 15px !important;
        }

        .listContainer {
            color: white;
        }

        .logoCDFooter {
            width: 75%;
            height: 100px;
            display: block;
            margin: 0 auto;
        }

        ul li {
            list-style: none;
        }
        .list{
            margin-left: 20px;
        }
        .mainTable {
            width: 100%;
        }

        .fontsemibold {
            font-weight: bold;
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
                        <h1 style="margin: 0px; margin-left: 12px; margin-top: 12px">{{ $item->mediatype['name'] }}
                            {{ $item->code }}</h1>
                        <p style="margin: 0px">
                            <span>
                                <img src="{{ public_path('assets/images/media/7.png') }}" alt="logo"
                                    class="addressLogo"></span>
                            {{ $item->address }}
                        </p>
                    </div>
                    <div class="listContainer">
                        <table class="mainTable" style="margin: 0px">
                            <tr>
                                <td style="width: 80%">
                                    <ul class="list">
                                        <li><span class="fontsemibold">-Distrito:</span> {{ $item->district['name'] }}
                                        </li>
                                        <li><span class="fontsemibold">-Medida de la Valla:</span> {{ $item->width }} X
                                            {{ $item->height }}</li>
                                        <li><span class="fontsemibold">-Flujo Vehícular:</span>
                                            {{ $item->traffic_flow }}</li>
                                        <li><span class="fontsemibold">-Iluminación:</span> {{ $item->lighting }}</li>
                                    </ul>
                                </td>
                                <td style="width: 20%">
                                    <img src="{{ public_path('assets/images/media/1.png') }}" alt="logo"
                                        class="logoCDFooter">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
