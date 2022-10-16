<?php
    session_start();
    include "./connect.php";
    connect_db();
    //* Check user from database
    if((isset($_POST['login']))&&($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM account WHERE user_name ='$user' AND pass = '$pass'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt -> fetchColumn();
        if ($kq == 0) {
            header("location: ../view/login.php?error=errorLogin");
        }
        else{
            $_SESSION['user_name'] = $user;
            function showEmailUser(){
                $conn = connect_db();
                $stmt = $conn->prepare("SELECT * FROM account WHERE user_name = '{$_SESSION['user_name']}'");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $kq = $stmt -> fetchAll();
                return $kq;
            }
            $emailUser = showEmailUser();
            $_SESSION['email_user'] = "";
            foreach ($emailUser as $value) {
                $_SESSION['email_user'] = $value['email'];
            }
            // $_SESSION['email_user'] = $emailUser;
            header('location: ../index.php');
            exit();
        }
    } 
?>