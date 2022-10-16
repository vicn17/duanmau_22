<?php
    include "../controller/controlHome.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link rel="shortcut icon" href="./img/image-removebg-preview.png" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/base.css" />
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section>
        <form action="../model/sign_up.php" id="form" method="post">
            <span><a href="../index.php">VICN</a></span>
            <input type="text" id="username" name="user_name" placeholder="Tên" required />
            <input type="email" name="email" placeholder="Email" pattern=".+@gmail.com" require>
            <input type="password" id="password" name="pass" placeholder="Mật khẩu" required />
            <input type="password" id="confirm_password" name="re_pass" placeholder="Nhập lại mật khẩu" required />
            <?php
                if((isset($_GET['act']) == 'khongtrungkhop') && ($_GET['act'])){
                    echo "<script type='text/javascript'> alert('Mật khẩu không trùng khớp') </script>";
                }
            ?>
            <button form="form" type="submit" name="signup" value="Dang ky">Đăng ký</button>
            <a href="./login.php">Đã có tài khoản</a>
        </form>
        <div class="img-left">
            <img src="./img/tocotoco4.jpg" alt="" />
        </div>
    </section>
</body>

</html>