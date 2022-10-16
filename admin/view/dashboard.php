<head>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
        $count = countProduce();
        $countCustomer = countCustomer();
    ?>
    <script src="./js/jsAdmin.js"></script>
    <div class="wrapperDashboard">
        <header id="headerDash" class="headerDash">
            <nav id="navDash" class="navDash">
                <span class="logoHeaderAdmin" onclick="changeTab()">VICN</span>
                <ul>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-house-user"></i>
                            <span>Tổng quát</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?act=order">
                            <i class="fa-solid fa-cart-flatbed-suitcase"></i>
                            <span>Đơn hàng</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?act=posts">
                            <i class="fa-solid fa-blog"></i>
                            <span>Bài viết</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?act=comment">
                            <i class="fa-solid fa-comment-dots"></i>
                            <span>Bình luận</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?act=category">
                            <i class="fa-solid fa-list"></i>
                            <span>Danh mục</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?act=produce">
                            <i class="fa-regular fa-clipboard"></i>
                            <span>Sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?act=chart">
                            <i class="fa-solid fa-chart-pie"></i>
                            <span>Thống kê</span>
                        </a>
                    </li>
                    <li>
                        <a href="../index.php">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span>Thoát</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <div id="mainDash" class="mainDash">
            <div class="headerMain">
                <div id="bar" class="navBar" onclick="handleClick()">
                    <i class="fa fa-navicon"></i>
                </div>
                <div class="searchBar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="" id="" placeholder="Tìm kiếm">
                </div>
                <div class="iconBar">
                    <a href="">
                        <i class="fa-solid fa-bell"></i>
                    </a>
                    <a href="">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </div>
            </div>
            <div class="contentDash">
                <div class="turnover childrenContent">
                    <div class="wrapBoxChil">
                        <div class="">
                            <i class="fa-solid fa-sack-dollar"></i>
                            <span>null</span>
                        </div>
                        <span>2,000,000 VNĐ</span>
                        <span>
                            <p>Tổng doanh thu</p>
                        </span>
                    </div>
                </div>
                <div class="grossProduct childrenContent">
                    <div class="wrapBoxChil">
                        <div class="">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span>null</span>
                        </div>
                        <span><?= $count ?></span>
                        <span>
                            <p>Tổng số sản phẩm</p>
                        </span>
                    </div>
                </div>
                <div class="customer childrenContent">
                    <div class="wrapBoxChil">
                        <div class="">
                            <i class="fa-solid fa-eye"></i>
                            <span>null</span>
                        </div>
                        <span><?= $countCustomer ?></span>
                        <span>
                            <p>Tổng số khách hàng</p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="orderManagement" style="text-align: center; width: 100%;">
                <h2>Đơn hàng</h2>
                <table style="margin: 1rem auto; width: 90%;">
                    <thead>
                        <tr style="white-space: nowrap;">
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Thông tin khách hàng</th>
                            <th>Tổng hóa đơn</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $order = showOrderUser();
                            $i = 1;
                            foreach ($order as $value) {
                                if($value['status'] < 2){
                                    echo '
                                    <tr>
                                        <th>'.$i.'</th>
                                        <th>'.$value['code_order'].'</th>
                                        <td style="text-align: start;">
                                            <div class="">
                                                <span style="font-weight: 600;">Tên khách hàng: </span>'.$value['user_name'].'
                                            </div>
                                            <div class="">
                                                <span style="font-weight: 600;">Sdt: </span>'.$value['number_phone'].'
                                            </div>
                                            <div class="">
                                                <span style="font-weight: 600;">Email: </span>'.$value['email'].'
                                            </div>
                                            <div class="">
                                                <span style="font-weight: 600;">Địa chỉ: </span>'.$value['address'].'
                                            </div>
                                        </td>
                                        <td style="color: green; font-weight: 800;">'.$value['total_order'].'đ</td>
                                        <td style="text-transform: uppercase;">'.$value['payment_method'].'</td>
                                        '.statusOrder($value).'
                                    </tr>
                                    ';
                                    $i++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>