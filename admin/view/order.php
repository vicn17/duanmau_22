<head>
    <link rel="stylesheet" href="./css/category.css">
</head>

<body>
    <div class="container">
        <div class="titleCate">
            <?php
                if(isset($_GET['act']) && ($_GET['act'] == "showAllOrder3")){
                    echo "<h1>Đơn hàng đã giao</h1>";
                }
                else{
                    echo "<h1>Đơn hàng</h1>";
                }
            ?>
            <hr>
        </div>
        <div class="formAddCate">
            <?php
                if(isset($_GET['act']) && ($_GET['act'] == "showAllOrder3")){
                    echo '<a href="'.$_SERVER['PHP_SELF'].'?act=order"
                    style="padding: 10px; background-image: linear-gradient(to right, #b2c9ac, #73beb7); color: white; border-radius: 8px; text-decoration: none;">Các đơn hàng đang xử lý</a>';
                }
                else{
                    echo '<a href="'.$_SERVER['PHP_SELF'].'?act=showAllOrder3"
                    style="padding: 10px; background-image: linear-gradient(to right, #b2c9ac, #73beb7); color: white; border-radius: 8px; text-decoration: none;">tất
                    cả đơn hàng đã giao</a>';
                }
            ?>
        </div>
        <section class="form">
            <table class="">
                <thead>
                    <tr style="white-space: nowrap;">
                        <th>STT</th>
                        <th>Thông tin khách hàng & đơn hàng</th>
                        <th>Tổng hóa đơn</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach ($order as $value) {
                            echo '
                            <tr>
                                <th>'.$i.'</th>
                                <td style="text-align: start;">
                                    <div class="">
                                        <span style="font-weight: 800;">MÃ ĐƠN HÀNG: '.$value['code_order'].'</span>
                                    </div>
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
                                <td style="white-space: nowrap;">
                                    <form action="'.$_SERVER['PHP_SELF'].'?act=updateOrder" id="formUpdateOrder" method="post">
                                        <input type="hidden" name="idOrder" id="" value="'.$value['id'].'">
                                        <input type="hidden" name="codeOrder" id="" value="'.$value['code_order'].'">
                                        <input type="hidden" name="userName" id="" value="'.$value['user_name'].'">
                                        <input type="hidden" name="emailUser" id="" value="'.$value['email'].'">
                                        <select name="statusOrder" id="selectOptionOrder" style="display: block; padding: 5px; border-radius: 8px; border: 2px solid green;">
                                            <option value="0">Chờ xác nhận</option>
                                            <option value="1" selected>Đã xác nhận</option>
                                            <option value="2">Đang giao hàng</option>
                                            <option value="3">Giao hàng thành công</option>
                                        </select>
                                        <div>
                                            <button name="btnSubmitOrder" style="padding: 8px 12px; background-image: linear-gradient(to right, #b2c9ac, #73beb7); color: white; text-decoration: none; border-radius: 8px; border: 1px solid transparent; cursor: pointer; margin: 10px 0;" type="submit" value="submit">Cập nhật</button>';
                                            if(isset($_GET['act']) && ($_GET['act'] == "showAllOrder3")){
                                                echo '<a href="/" style="background-color: red; padding: 10px 20px; color: white; text-decoration: none; border-radius: 8px; margin-left: 10px;">Xóa</a>';
                                            }
                                            echo '
                                        </div>
                                    </form>
                                    <a href="'.$_SERVER['PHP_SELF'].'?act=orderDetails&idOrder='.$value['id'].'&codeOrder='.$value['code_order'].'" style="color: green;">Chi tiết đơn hàng</a>
                                </td>
                            </tr>
                            ';
                            $i++;
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </div>

</body>