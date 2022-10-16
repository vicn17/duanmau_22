<?php
session_start();
$_SESSION['linkCart'] = $_SERVER['PHP_SELF'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../admin/css/table.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/order.css">
    <link rel="stylesheet" href="../css/viewCart.css">
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
        include './order_login.php';
        include '../../controller/controlOrder.php';
    ?>
    <h2 style="color: #2f9d77; width: 100%; text-align: center; margin: 2rem 0;">Giỏ hàng</h2>
    <div class="wrapper">
        <?php
            //* Show cart from session cart
            if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)){
                echo '<div class="tableCart">';
                $sum = 0;
                $i = 0;
                foreach ($_SESSION['cart'] as $value) {
                    $sum += $value[4]; 
                            echo'<div class="gripCart">
                                    <input type="checkbox" name="" id="">
                                    <div class="imgPro">
                                        <img src="../../uploads/img/'.$value[0].'" alt="" width="80" height="80">
                                    </div>
                                    <div class="contentCart">
                                        <span class="namePro"><b>'.$value[1].'</b></span>
                                        <span><b>Giá:</b> '.$value[2].'đ</span>
                                        <span><b>Số lượng:</b> '.$value[3].'</span>
                                        <span><b>Tổng giá:</b> '.$value[4].'đ</span>
                                    </div>
                                    <div class="delCart">
                                        <a href="viewCart.php?page=delOneCart&idCart='.$i.'" style="color: red;">Xóa</a>
                                    </div>
                                </div>';
                }
                echo '<div class="thaoTac">
                        <a href="../order.php?page=delCart">Xóa giỏ hàng</a>
                        <a href="../order.php">Tiếp tục mua hàng -></a>
                    </div>';
                echo '</div>';
    }
    if(!isset($_SESSION['cart']) && isset($code_order)){
        echo '<div class="successPayment">
            <h2 style="color: green;">Thanh toán thành công</h2>
            <h3>Mã đơn hàng: '.$code_order.'</h3>
            <h3>Tên khách hàng: '.$user_name.'</h3>
            <h3>Tổng hóa đơn: '.$total_order.'đ</h3>
            <h4>Thông tin chi tiết đơn hàng sẽ được gửi vào mail của bạn.</h4>
            <a href="../../index.php">Quay lại trang chủ</a> | <a href="../order.php">Tiếp tục đặt hàng</a>
        </div>';
    }
    if(isset($_SESSION['cart'])){
        echo'<div class="pay">
            <div class="titlePay">
                <h2>Thanh toán</h2>
            </div>
            <form id="payCart" action="'.$_SERVER["PHP_SELF"].'?page=pay" method="post">
            <label for="" class="boldTitlePay">Tên khách hàng</label>
            <input type="text" name="nameUser" required>
            <label for="" class="boldTitlePay">Số điện thoại</label>
            <input type="number" name="numberPhone" min="10" required>
            <label for="" class="boldTitlePay">Email</label>
            <input type="text" name="email" required>
            <label for="" class="boldTitlePay">Địa chỉ</label>
            <textarea name="address" id="" cols="30" rows="3" required></textarea>
            <label for="" class="boldTitlePay">Phương thức thanh toán</label>
            <div class="method">
                <input type="radio" name="radio" id="momo" value="1" required><label for="momo">Thanh toán
                    MOMO</label>
            </div>
            <div class="method">
                <input type="radio" name="radio" id="bank" value="2" required><label for="bank">Thanh toán ngân
                    hàng</label>
            </div>
            <div class="method">
                <input type="radio" name="radio" id="receive" value="3" required><label for="receive">Thanh toán khi
                    nhận
                    hàng</label>
            </div>
            <button form="payCart" type="submit" name="paySubmit" value="paySubmit">Thanh toán</button>
            </form>
        </div>';
        echo '<div class="payMobile">
                <form id="payCartMobile" action="'.$_SERVER['PHP_SELF'].'?page=payMobile" method="post">
                    <div class="contentPayMobile">
                        <span>Tổng cộng: <b style="color: green">'.$sum.'đ</b></span>
                        <span>Phí vận chuyển: <b style="color: green">0đ</b></span>
                    </div>
                    <button form="payCartMobile" type="submit" name="paySubmit" value="paySubmit">Thanh toán</button>
                </form>
            </div>';
        }
    ?>
    </div>
</body>

</html>