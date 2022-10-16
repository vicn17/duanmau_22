<div class="menu_header">
    <div class="menu_header_center">
        <h1>VICN</h1>
        <input type="checkbox" name="" id="click_menu_btn" />
        <nav>
            <ul>
                <li>
                    <a href="./index.php?page=home&account=<?=$_SESSION['user_name']?>">Trang chủ</a>
                </li>
                <li>
                    <a href="<?= $_SERVER['PHP_SELF'] ?>?page=news&user=<?= $user ?>">Tin tức</a>
                </li>
                <li>
                    <a href="<?= handleLink() ?>">Sản
                        phẩm</a>
                </li>
                <li>
                    <a href="#last_section">Cửa hàng</a>
                </li>
                <li>
                    <a href="<?= $_SERVER['PHP_SELF'] ?>?page=recruit&user=<?= $user ?>">Tuyển dụng</a>
                </li>
                <?php
                    echo '<li class="accountUser">
                            <label for="displayBox" style="color: #2f9d77;">
                                Xin chào - '. $_SESSION['user_name'].'
                            </label>
                            <input type="checkbox" name="" id="displayBox" style="display: none;">
                            <div class="boxAccount">
                                <img src="./view/img/Avatar-che-mat-bang-dien-thoai-cho-nam.jpg" alt="avatar">
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
<div class="text-banner">
    <div class="">
        <h3>VICN Tea</h3>
        <h1>
            đậm vị thiên nhiên <br />
            trọn vị hạnh phúc
        </h1>
        <p>
            Với sứ mệnh mang tới niềm vui và hạnh phúc, VICN hy vọng sẽ tạo
            nên
            <br />
            một nét văn hóa giải trí bên cạnh ly trà sữa Ngon – sạch – tươi.
        </p>
        <a class="btn-login" href="<?php session_unset(); ?>"> Logout - User </a>
    </div>
</div>