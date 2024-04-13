<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php
session_start();
if(isset($_SESSION['logIn'])){
    header("location: UserBm/RegisterUser/Login/logout.php");
}
?>
<!--<b>Yangliklar.uz</b>-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/admin">
            <img src="Loguz.png" alt="" width="130" >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="#"><b><b>O‘ZBEKISTON</b></b></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><b><b>JAHON</b></b></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><b><b>IQTISODIYOT</b></b></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><b><b>SPORT </b></b></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><b><b>FAN-TEXNIKA</b></b></a>
                </li>


            </ul>
        </div>
        <div class="ml-auto">
            <a class='btn btn-dark' href="/index.php">Chiqish</a>

        </div>
    </div>
</nav>

</body>
</html>
