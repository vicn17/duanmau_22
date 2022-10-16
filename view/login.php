<?php
    session_start();
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
    <link rel="stylesheet" href="./css/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section>
        <form id="form" action="../model/loggin_mo.php" method="post">
            <span><a href="../index.php">VICN</a></span>
            <!-- <label for="username"></label> -->
            <input type="text" id="username" name="username" placeholder="Tên đăng nhập" required />
            <input type="password" id="password" name="password" placeholder="Mật khẩu" required />
            <p style="color: red;">
                <?php
                    if(isset($_GET['error']) && ($_GET['error'] == "errorLogin")){
                        echo "Tài khoản hoặc mặt khẩu không chính xác";
                    }
                ?>
            </p>
            <button form="form" type="submit" name="login" value="Đăng nhập">Đăng nhập</button>
            <a href="./signup.php">Chưa có tài khoản?</a>
        </form>
        <div class="img-left">
            <img src="./img/tocotoco4.jpg" alt="" />
        </div>
    </section>
</body>

</html>