<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
i {
    font-size: 32px;
    color: #2f9d77;
    margin-left: 0.5rem;
}
</style>

<body>
    <?php
    include "../controller/controlHome.php";
    include './connect.php';
    $conn = connect_db();
    require './sendMail.php';
    //* Date processing when user sign up
    if((isset($_POST['signup'])) && ($_POST['signup'])){
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        if($user_name == "" || $email == ""){
            header("location: ../view/signup.php?page=errorSignup");
        }
        else{
            $pass = $_POST['pass'];
            $re_pass = $_POST['re_pass'];
            if($re_pass == $pass){
                $title = "customer confirmation";
                $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $link = ''.$url.'?page='.md5("checkUser").'&'.md5("username").'='.$user_name.'&'.md5("email").'='.$email.'&'.md5("pass").'='.$pass.'';
                $content = '<p><b>Click vào link bên dưới để xác nhận đăng ký tài khoản:</b></p>
                            <p><a href="'.$link.'">'.$link.'</a></p>
                            <p>Cảm ơn bạn đã quan tâm đến shop. <3</p>
                            ';
                $mail = checkUserSignup($title, $content, $email, $user_name);
                echo'<script>
                    alert("Kiểm tra mail của bạn để xác nhận thông tin khách hàng");
                    </script>';
                $style = "display: flex; justify-content: center; align-items: center; width: 100%; height: 100vh;";
                echo '<div class="" style="'.$style.'">
                        <h3 style="color: #2f9d77;">sent confirmation email</h3>
                        <i class="fa-regular fa-circle-check"></i>
                    </div>';
            }
            else {
                header('location: ../view/signup.php?act=khongtrungkhop');
            }
        }
    }
?>
</body>

</html>