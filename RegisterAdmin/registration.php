<?php
session_start();
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    if($password != $confirmPassword){
        $_SESSION['error'] = "1-parol bilan 2-parol mosmas !";
    }else{
        include '../data.php';
        $state=$conn->prepare("SELECT * FROM User WHERE username=:username");
        $state->bindValue(":username",$username);
        $state->execute();
        if ($state->rowCount() > 0){
            $_SESSION['error'] = "Bunday e-maildagi foydalanuvchi mavjud !";
        }
        else{
            $role="author";
            $password = password_hash($password, PASSWORD_DEFAULT);
            $state =$conn->prepare("insert into User (username, password, firstName, lastName,role)
                                    values (:username, :password, :firstname, :lastname, :role)");
            try {
                $state->execute(["username"=>$username, "password"=> $password, "firstname"=>$firstName, "lastname"=>$lastName, "role"=>$role]);
                $_SESSION['success']='ok';
            }catch (PDOException $e){
                $_SESSION['error']=$e->getMessage();
            }
        }
    }
}else{
    $_SESSION['error']="Maydonlarni to'ldring";
}
header('location: /RegisterAdmin/register.php');