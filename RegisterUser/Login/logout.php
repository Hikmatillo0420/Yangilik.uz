<?php
session_start();
if(isset($_SESSION['logIn'])){
    unset($_SESSION['logIn']);
    header("Location:/UserBm/index.php");exit();
}
