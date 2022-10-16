<?php
session_start();
if(!isset($_SESSION['linkHeaderOtherNews'])) $_SESSION['linkHeaderOtherNews'] = "Tin tức";
$news = $_SESSION['linkHeaderOtherNews'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/base.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/introduce.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="shortcut icon" href="./img/image-removebg-preview.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./js/index.js"></script>
    <title>Tin tức</title>
</head>

<body>
    <div class="container">
        <div id="banner-header">
            <?php
                if(isset($_SESSION['user_name'])){
                    include "./layout/headerOrderLogin.php";
                }
                else{
                    include "./layout/headerOther.php"; 
                }
            ?>
        </div>
        <div class="grip_news">
            <?php
                include "../model/connect.php";
                include "../model/posts.php";
                $posts = showPosts();
                foreach ($posts as $value) {
                    echo "<div class='cardNews'>
                            <img src='../uploads/imgPosts/{$value['img_posts']}' alt=''>
                            <div class='title'><a href=''>".str_replace('-', ' ', $value['title_posts'])."</a></div>
                            <div class='content'>{$value['content_posts']}</div>
                        </div>";
                }
            ?>
        </div>
        <footer>
            <?php
                include "./layout/footer.php";
            ?>
        </footer>
    </div>
</body>

</html>