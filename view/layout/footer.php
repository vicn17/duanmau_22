<?php
    $link = $_SESSION['linkHome'] == $_SERVER['PHP_SELF'] ? "./view/img/image-removebg-preview.png" : "./img/image-removebg-preview.png";
?>
<div class="footer">
    <div class="content-footer">
        <img src="<?= $link ?>" alt="" />
    </div>
    <div class="content-footer">
        <span>Copyrights © 2019 by ToCoToCoTea. All rights reserved.</span>
    </div>
    <div class="content-footer">
        <a href="https://www.facebook.com/tocotocobubbletea">
            <i class="fa-brands fa-facebook-square fb-icons"></i>
        </a>
        <a href="https://www.instagram.com/tocotoco_bubble_tea/">
            <i class="fa-brands fa-instagram-square fb-icons"></i>
        </a>
        <a href="https://www.tiktok.com/@tocotocobubbletea/">
            <i class="fa-brands fa-twitter-square fb-icons"></i>
        </a>
    </div>
</div>