<?
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yanglik.uz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<div class="container"><br>
    <h1>Ro‘yxatdan o‘tish</h1>
    <div class="row justify-content-start">
        <?php
        if(isset($_SESSION["error"])){
            echo "<div class='alert alert-danger' role='alert'>
                            ".$_SESSION['error']."
                </div>";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION["success"])){
            header('location: /RegisterUser/Login/login.php');

        }
        ?>

        <div class="col-md-5">
            <form method="post" action="registration.php">
                <div class="mb-3"><br>
                    <label for="usernameInput" class="form-label">Elektron pochta manzil</label>
                    <input type="email" class="form-control" id="usernameInput" name="username">
                </div>
                <div class="mb-3">
                    <label for="passInput" class="form-label">Elektron pochta paroli</label>
                    <input type="password" class="form-control" id="passInput" name="password">
                </div>
                <div class="mb-3">
                    <label for="confirmPassInput" class="form-label">Elektron pochta paroli qayta kiriting</label>
                    <input type="password" class="form-control" id="confirmPassInput" name="confirmPassword">
                </div>
                <div class="mb-3">
                    <label for="firstnameInput" class="form-label">Ism</label>
                    <input type="text" class="form-control" id="firstnameInput" name="firstName">
                </div>
                <div class="mb-3">
                    <label for="lastnameInput" class="form-label">Familya</label>
                    <input type="text" class="form-control" id="lastnameInput" name="lastName">
                </div>
                <button type="submit" class="btn btn-primary" name="register">Yuborish</button>
            </form>
        </div>
    </div>
</div>