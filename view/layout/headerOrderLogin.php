<div class="menu_header">
    <div class="menu_header_center">
        <h1>Vicn</h1>
        <input type="checkbox" name="" id="click_menu_btn" />
        <nav>
            <ul>
                <li>
                    <a href="../index.php">Trang chủ</a>
                </li>
                <li>
                    <a href="./introduce.php">Tin tức</a>
                </li>
                <li>
                    <a href="./order.php">Sản phẩm</a>
                </li>
                <li>
                    <a href="#last_section">Cửa hàng</a>
                </li>
                <li>
                    <a href="./recruit.php">Tuyển dụng</a>
                </li>
                <?php
                    echo '<li class="accountUser">
                            <label for="displayBox" style="color: #2f9d77;">
                                Xin chào - '. $_SESSION['user_name'].'
                            </label>
                            <input type="checkbox" name="" id="displayBox" style="display: none;">
                            <div class="boxAccount">
                                <img src="./img/Avatar-che-mat-bang-dien-thoai-cho-nam.jpg" alt="avatar">
                                <h3>'.$_SESSION['user_name'].'</h3>
                                <a href="#" style="color: blue; margin-top: 7rem;">Cập nhật thông tin</a>
                            </div>
                        </li>';
                ?>
            </ul>
        </nav>
        <label class="menu_btn" for="click_menu_btn"><i class="fa-solid fa-bars"></i></label>
    </div>
</div>
<?php
    isset($news) ? $news = $_SESSION['linkHeaderOtherNews'] : $news = null;
    isset($recruit) ? $recruit = $_SESSION['linkHeaderOtherRecruit'] : $recruit = null;
    function titleOther($news, $recruit){
        if(isset($news) && $news != null){
            return $news;
        }elseif(isset($recruit) && $recruit != null){
            return $recruit;
        }else{
            return "null";
        }
    }
?>
<div class="banner_header" style="height: 40vh; background: rgba(0, 0, 0, 0.6) url(./img/breadcrumb_bg5.png);  background-blend-mode: darken;
  background-repeat: no-repeat;
  background-size: cover; width: 100%; display: flex; justify-content: center; align-items: center;">
    <h1 style=" color: white; margin-top: 8rem;"><?= titleOther($news, $recruit) ?></h1>
</div>