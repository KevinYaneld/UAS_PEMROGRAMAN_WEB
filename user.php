<?php
session_start();
include 'config.php';
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KVC</title>
    <link rel="stylesheet" href="PostTest2.css">
    
</head>

<body style="background-color: var(--secondary-color);">

    <style>
        input[type="submit"]{
            width: 150%;
            height: 50px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 25px;
            font-size: 18px;
            color: whitesmoke;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }
        
        input[type="submit"]:hover{
            border-color: #2691d9;
            transition: .5s;
        }

        .center input[type="submit"]{
            width: 25%;
            height: 50px;
            align-items: center;
            border: 1px solid;
            background: #2691d9;
            border-radius: 25px;
            font-size: 18px;
            color: whitesmoke;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }
    </style>

    <div class ="container"id="home">
        <div class="navbar" style="border-bottom: 3px solid var(--primary-color);">
            <h2 id = "judul" class = "logo"> KVC </h2>
                <nav>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="produk_user.php">Produk</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li><img src = "image/moon.png" id = "icon"></li>
                    </ul>
                </nav>
        </div>

        <div class="row-1"id="home">
            <div class = "col-1">
                <h2>AWESOME APPS</h2>
                <P>Website Baru Yang Dapat Mempermudah Anda Dalam Mendapatkan Suatu Aplikasi</P>
                <button onclick="press()" type="button">Download Sekarang</button>
            </div>
            <div class="col-2">
                <img src="image\phone.png" class="image">
            </div>
        </div>

        
        <div class="row-2" id="about">
            <div class = "col-1">
                <h2>ABOUT US</h2>
                <button id = "btn">Press</button>
                <P id ="info" style="display: none">Website ini dibuat oleh seorang mahasiswa untuk mengerjakan  
                    Pemrograman Web yang bernama Kevin Yaneld Cendhana Dengan NIM 2109106031
                    dan sedang berkuliah di Universitas Mulawarman
                </P>
            </div>
            <div class="col-2">
                <img src="image\About-Us-PNG-Photos.png" class="image">
            </div>
        </div> 
        
        
    </div> 


</body>

<footer>
    <h4>Contact Us On :
    <img src="image/fb.png" class="medsos">
    <img src="image/ig.png" class="medsos">
    <img src="image/tw.png" class="medsos">
    </h4>
</footer>

<script src="script.js"></script>
</html>