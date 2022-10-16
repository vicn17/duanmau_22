<?php
    session_start();
    isset($_SESSION['user_name']) ? $user = $_SESSION['user_name'] : "";
    if(!isset($_SESSION['linkHome'])) $_SESSION['linkHome'] = $_SERVER['PHP_SELF'];
    if(isset($_GET['page'])){
        include './controller/controlHome.php';
    }else
{?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="shortcut icon" href="./view/img/image-removebg-preview.png" />
    <link rel="stylesheet" href="./view/css/index.css">
    <link rel="stylesheet" href="./view/css/footer.css">
    <link rel="stylesheet" href="./view/css/base.css">
    <link rel="stylesheet" href="./view/css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./view/js/index.js"></script>
</head>
<?php 
    //* Get link when isset user
    function handleLink(){
        if(!isset($_SESSION['user_name'])){
            $link = './view/order.php';
        }
        else{
            $link = './index.php?page=order&account='.$_SESSION['user_name'];
        }
        return $link;
    }
    function handleLinkUser($user){
        if(!isset($user)){
            $link = './view/order.php';
        }
        else{
            $link = './index.php?page=order&account='.$user;
        }
        return $link;
    }
?>

<body>
    <div class="container">
        <header id="banner-header">
            <?php
                //* include header by use case
                if(isset($_SESSION['user_name']) && ($_SESSION['user_name'] == 'admin')){
                    include './view/layout/header_log_admin.php';
                }
                else if(isset($_SESSION['user_name']) && $_SESSION['user_name'] != 'admin'){
                    include './view/layout/header_log.php';
                }
                else{
                    include './view/layout/header.php';
                }
            ?>
        </header>
        <aside>
            <?php include './view/layout/aside.php'; ?>
        </aside>
        <footer>
            <?php $_SESSION['linkHome'] = $_SERVER['PHP_SELF']; include './view/layout/footer.php' ?>
        </footer>
    </div>
</body>

</html>
<?php }?>