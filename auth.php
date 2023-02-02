<?php
session_start();
include ('dbh.php');

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        header("Location: login.php?error=Email is required");
    }else if(empty($password)){
        header("Location: login.php?error=Password is required";)
    }else{
        $statement = $databaseConnection->prepare("SELECT * FROM users WHERE email=?");
        $statement->execute([$email]);

        if($statement->rowCount()===1){
            $user = $statement->fetch();

            $userId = $user['id'];
            $userEmail = $user['email'];
            $userPassword = $user['password'];
            $userFullname = $user['Fullname'];


            if($email === $userEmail){
                if($password === $userPassword){
                    $_SESSION['id']= $userId;
                    header("Location: students.php");
                }else{
                    header("Location: login.php?error=Incorrect Username or Password");
            }
            }else{
                header("Location: login.php?error=Incorrect Username or Password")
            }
        }else{
            header("Location: login.php?error=Incorrect Username or Password")
        }
    }
}
?>