<head>
    <link rel="stylesheet" href="./css/category.css">
</head>

<body>
    <div class="container">
        <div class="titleCate">
            <h1>Chi tiết đơn hàng</h1>
            <hr>
        </div>
        <div class="formAddCate">
            <a href="<?= $_SERVER['PHP_SELF'] ?>?act=order"
                style="padding: 10px; background-image: linear-gradient(to right, #b2c9ac, #73beb7); border-radius: 8px; color: white; text-decoration: none;">Quay
                lại danh sách đơn hàng</a>
        </div>
        <section class="form"></section>
        <h2 style="width: 100%; text-align: center;">Thông tin đơn hàng</h2>
        <table class="">
            <thead>
                <tr>
                    <th scope="col">
                        Mã đơn hàng
                    </th>
                    <th scope="col">
                        Thông tin khách hàng & đơn hàng
                    </th>
                    <th scope="col">
                        Tổng hóa đơn
                    </th>
                    <th scope="col">
                        Tình trạng
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($order as $value) {
                        echo '
                        <tr>
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
                                <div style="text-transform: uppercase; font-weight: 800;">
                                    '.$value['payment_method'].'
                                </div>
                            </td>
                            <td style="color: green; font-weight: 800;">'.$value['total_order'].'đ</td>
                            '.statusOrder($value).'
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
        <h2 style="width: 100%; text-align: center;">Giỏ hàng</h2>
        <table class="">
            <thead>
                <tr>
                    <th scope="col">
                        STT
                    </th>
                    <th scope="col">
                        Ảnh sản phẩm
                    </th>
                    <th scope="col">
                        Tên sản phẩm
                    </th>
                    <th scope="col">
                        Giá
                    </th>
                    <th scope="col">
                        Số lượng
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $i = 1;
                        foreach ($cart as $value) {
                            echo "<tr>
                                    <th>{$i}</th>
                                    <td><img src='../uploads/img/{$value['img']}' alt='vicn' width='80px' height='80px' style='margin: 0 auto;'></td>
                                    <td>{$value['name_pro']}</td>
                                    <td style='color: green; font-weight: 800;'>{$value['price']}đ</td>
                                    <th>{$value['amount']}</th>
                                </tr>";
                            $i++;
                        }
                    ?>
            </tbody>
        </table>
        </section>
    </div>

</body>