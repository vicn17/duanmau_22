<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/order.css">
    <link rel="stylesheet" href="../css/viewCart.css">
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
.pay {
    display: block;
}
</style>

<body>
    <?php
        include "../../controller/controlOrder.php";
        if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)){
            include "./order_login.php";
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
            echo '</div>';
            if(isset($_SESSION['cart'])){
                echo'<div class="pay">
                        <div class="titlePay">
                            <h2>Thanh toán</h2>
                        </div>
                        <form id="payCart" action="'.$_SERVER["PHP_SELF"].'?page=pay&vi=1" method="post">
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
            }
        }
    ?>
</body>

</html>