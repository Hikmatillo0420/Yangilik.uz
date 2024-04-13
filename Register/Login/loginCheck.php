<?php
session_start();
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    include_once '../../data.php';

    $state=$conn->prepare("SELECT * FROM user WHERE username=:username");
    $state->execute(['username'=>$username]);
    if($state->rowCount()>0){
        $user = $state->fetch();
            if (password_verify($password, $user['password'])) {
                $_SESSION['success']="ok";
                $_SESSION['logIn']="1";
                header('Location:/admin/index.php');exit();
            }else{
                $_SESSION['username']= $username;
                $_SESSION['error']="Kiritilgan parol xato !";
            }
    }else{
        $_SESSION['username']= $username;
        $_SESSION['error']="Kiritilgan e-mail egasi hali ro‘yxatdan o‘tmagan !";
    }
    header('location:/Register/Login/login.php');
}
