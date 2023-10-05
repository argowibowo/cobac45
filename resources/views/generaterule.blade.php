<!DOCTYPE html>
<?php 

$c45 = new Algorithm\C45();
$input = new Algorithm\C45\DataInput;

$data = $kasus;
// $data = array(
// 	array(
// 		"OUTLOOK" => "Sunny",
// 		"TEMPERATURE" => "Hot",
// 		"HUMIDITY" => "High",
// 		"WINDY" => "False",
// 		"PLAY" => "No"
// 	),
// 	array(
// 		"OUTLOOK" => "Sunny",
// 		"TEMPERATURE" => "Hot",
// 		"HUMIDITY" => "High",
// 		"WINDY" => "True",
// 		"PLAY" => "No"
// 	),
// 	array(
// 		"OUTLOOK" => "Cloudy",
// 		"TEMPERATURE" => "Hot",
// 		"HUMIDITY" => "High",
// 		"WINDY" => "False",
// 		"PLAY" => "Yes"
// 	),
// 	array(
// 		"OUTLOOK" => "Rainy",
// 		"TEMPERATURE" => "Mild",
// 		"HUMIDITY" => "High",
// 		"WINDY" => "False",
// 		"PLAY" => "Yes"
// 	),
// 	array(
// 		"OUTLOOK" => "Rainy",
// 		"TEMPERATURE" => "Cool",
// 		"HUMIDITY" => "Normal",
// 		"WINDY" => "False",
// 		"PLAY" => "Yes"
// 	),
// 	array(
// 		"OUTLOOK" => "Rainy",
// 		"TEMPERATURE" => "Cool",
// 		"HUMIDITY" => "Normal",
// 		"WINDY" => "True",
// 		"PLAY" => "No"
// 	),
// 	array(
// 		"OUTLOOK" => "Cloudy",
// 		"TEMPERATURE" => "Cool",
// 		"HUMIDITY" => "Normal",
// 		"WINDY" => "True",
// 		"PLAY" => "Yes"
// 	),
// 	array(
// 		"OUTLOOK" => "Sunny",
// 		"TEMPERATURE" => "Mild",
// 		"HUMIDITY" => "High",
// 		"WINDY" => "False",
// 		"PLAY" => "No"
// 	),
// 	array(
// 		"OUTLOOK" => "Sunny",
// 		"TEMPERATURE" => "Cool",
// 		"HUMIDITY" => "Normal",
// 		"WINDY" => "False",
// 		"PLAY" => "Yes"
// 	),
// 	array(
// 		"OUTLOOK" => "Rainy",
// 		"TEMPERATURE" => "Mild",
// 		"HUMIDITY" => "Normal",
// 		"WINDY" => "False",
// 		"PLAY" => "Yes"
// 	),
// 	array(
// 		"OUTLOOK" => "Sunny",
// 		"TEMPERATURE" => "Mild",
// 		"HUMIDITY" => "Normal",
// 		"WINDY" => "True",
// 		"PLAY" => "Yes"
// 	),
// 	array(
// 		"OUTLOOK" => "Cloudy",
// 		"TEMPERATURE" => "Mild",
// 		"HUMIDITY" => "High",
// 		"WINDY" => "True",
// 		"PLAY" => "Yes"
// 	),
// 	array(
// 		"OUTLOOK" => "Cloudy",
// 		"TEMPERATURE" => "Hot",
// 		"HUMIDITY" => "Normal",
// 		"WINDY" => "False",
// 		"PLAY" => "Yes"
// 	),
// 	array(
// 		"OUTLOOK" => "Rainy",
// 		"TEMPERATURE" => "Mild",
// 		"HUMIDITY" => "High",
// 		"WINDY" => "True",
// 		"PLAY" => "No"
// 	)
// );
// Initialize Data
$input->setData($data);

// Set data from array
//$input->setAttributes(array('OUTLOOK', 'TEMPERATURE', 'HUMIDITY', 'WINDY', 'PLAY')); // Set attributes of data
$input->setAttributes(array('G1','G2','G3','G4','G5','G6','G7','G8','G9','G10',
'G11','G12','G13','G14','G15','G16','G17','G18','G19','G20',
'G21','G22','G23','G24','G25','G26','G27','G28','G29','G30',
'G31','G32','G33','G34','G35','G36','G37','G38','G39','G40',
'G41','G42','G43','kode_penyakit')); // Set attributes of data

// Initialize C4.5
$c45->c45 = $input; // Set input data
$c45->setTargetAttribute('kode_penyakit'); // Set target attribute
//$c45->setTargetAttribute('PLAY');
$initialize = $c45->initialize(); // initialize

// Build Output
$buildTree = $initialize->buildTree(); // Build tree
$arrayTree = $buildTree->toArray(); // Set to array

$arrc45 = array();
$count = 1;
$stringTree = $buildTree->toString('',$count,$arrc45); // Set to string
dd($arrc45);
//dd($stringTree);

// echo "<pre>";
// print_r ($arrayTree);
// echo "</pre>";

// echo $stringTree;

//untuk cetak tree visualisasi bisa lihat di sini lengkap dengan parent dan child
//dd($buildTree);


?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>