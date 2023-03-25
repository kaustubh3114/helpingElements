<?php

include 'C:\xampp\htdocs\helpingelements\config\constants.php';

if(isset($_POST['work'])){
    if($_POST['work'] == "login"){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $Query_login = "SELECT * FROM `users`";

        $SQL_login = mysqli_query($conn,$Query_login);
        while($user = mysqli_fetch_assoc($SQL_login)){
            if($user['email'] == $email && $pass == $user['password']){
                $_SESSION['user'] = $email;
                header("location: index.php");
            }
        }
        


    }else if($_POST['work'] == "register"){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $U_Name = $_POST['userName'];

        $Query_register = "INSERT INTO `users`(`email`, `username`, `password`) VALUES ('$email','$U_Name','$pass')";

        $SQL_register = mysqli_query($conn,$Query_register);

        if($SQL_register){
            $_SESSION['user'] = $email;

            header("location: index.php");
        }else{
            echo "ERROR While register";
        }

    }else{
        echo "Error";
    }
}else if(isset($_GET['work'])){
    unset ($_SESSION['user']);
    header("location: index.php");
}
else{
    echo "error";
}

?>