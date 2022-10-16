<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'order':
                //* redirect(chuyển hướng) to page order and save session user
                $_SESSION['user_name'] = $_GET['account'];
                header("location: ./view/order.php");
                exit();
                break; 
            case 'home':
                //* redirect to page home and save session user
                $_SESSION['user_name'] = $_GET['account'];
                header("location: ./index.php");
                exit();
                break;
            case 'login':
                header("location: ./view/login.php");
                exit();
                break;
            case 'navigationAdmin':
                //* redirect to page admin and save session user
                $_SESSION['user_name'] = $_GET['account'];
                header("location: ./admin/index.php");
                exit();
                break;
            case 'errorSignup':
                //* warning when input is empty
                echo '<script> alert("Không đc để trống") </script>';              
                break;
            case 'successfulSignup':
                //* warning when sign up successfully
                echo '<script> alert("Đăng ký thành công") </script>';              
                break;
            case md5("checkUser"):
                //* Send mail when user sign up successfully and redirect to page login
                session_start();
                if(!isset($_SESSION['check'])) $_SESSION['check'] = "check";
                $user_name = $_GET[md5('username')];
                $email = $_GET[md5('email')];
                $pass = $_GET[md5('pass')];
                include './connect.php';
                require './sendMail.php';
                if(isset($_SESSION['check'])){
                    $conn = connect_db();
                    $sql = "INSERT INTO account (user_name, pass, type, email)
                    VALUES ('$user_name', '$pass', '0', '$email' )";
                    // use exec() because no results are returned
                    $conn->exec($sql);
                    $title = "Successful account VICN registration";
                    $content = '<p><b>Thông tin tài khoản</b></p>
                                <p>Tên đăng nhập: '.$user_name.'</p>
                                <p>Mật khẩu: '.$pass.'</p>
                                <p>Cảm ơn bạn đã quan tâm đến shop. <3</p>
                                ';
                    $mail = signUp($title, $content, $email, $user_name);
                    header('location: ../view/login.php?page=successfulSignup');
                }
                break;
                case 'news':
                    $_SESSION['user_name'] = $_GET['user'];
                    header("location: ./view/introduce.php");
                    break;
                case 'recruit':
                    $_SESSION['user_name'] = $_GET['user'];
                    header("location: ./view/recruit.php");
                    break;
            default:
                # code...
                break;
        }
    }
?>