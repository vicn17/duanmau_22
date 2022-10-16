<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'viewCart':
                include '../model/cart.php';
                if($_GET['account'] == 1){
                    $img = $_POST['imgCart'];
                    $name_pro = $_POST['nameProCart'];
                    $price = $_POST['priceCart'];
                    $count = $_POST['countCart'];
                    $sum = $price * $count;
                    addToCart($img, $name_pro, $price, $count, $sum);
                }
                else{
                    header('location: ../view/login.php');
                }
            break;
            case 'delCart':
                //* Delect all cart
                if(isset($_SESSION['cart'])) unset($_SESSION['cart']);
                header("location: ./order.php");
                exit();
                break;
            case 'delOneCart':
                //* Delect cart by id
                if((isset($_GET['idCart']))){
                    $idCart = $_GET['idCart'];
                    // unset($_SESSION['cart'][$idCart]);
                    array_splice($_SESSION['cart'], $idCart, 1);
                    if(count($_SESSION['cart']) > 0){
                        header("location: ./viewCart.php");
                    }else{
                        header("location: ../order.php");
                    }
                }
                break;
            case 'pay':
                if((isset($_POST['paySubmit'])) && ($_POST['paySubmit'])){
                    $user_name = $_POST['nameUser'];
                    $numberPhone = $_POST['numberPhone'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $code_order = "VICN".rand(0, 99999);
                    if($_POST['radio'] == "1"){
                        $payment = "Thanh toán MOMO";
                    }
                    else if($_POST['radio'] == "2"){
                        $payment = "Thanh toán ngân hàng";
                    }
                    else {
                        $payment = "Thanh toán khi nhận
                        hàng";
                    }
                    include '../../model/cart.php';
                    $total_order = 0;
                    $index = 0;
                    if(isset($_SESSION['cart'])){
                        foreach ($_SESSION['cart'] as $value) {
                            $img = $_SESSION['cart'][$index][0];
                            $name_pro = $_SESSION['cart'][$index][1];
                            $price = $_SESSION['cart'][$index][2];
                            $amount = $_SESSION['cart'][$index][3];
                            $sumPrice = $_SESSION['cart'][$index][4];
                            createCartUser($code_order, $img, $name_pro, $price, $amount);
                            $total_order += $sumPrice;
                            $index++;
                        }
                        createOrder($code_order, $total_order, $payment, $user_name, $address, $email, $numberPhone);
                        unset($_SESSION['cart']);
                        if(!isset($_SESSION['cart'])){
                            include "../../model/sendMailPayment.php";
                            $title = "VICN Payment successfully";
                            $content = "
                                <p><h1>Thông tin đơn hàng</h1></p>
                                <p><b>Mã đơn hàng: ".$code_order."</b></p>
                                <p><b>Tên khách hàng:</b> ".$user_name."</p>
                                <p><b>Số điện thoại:</b> ".$numberPhone."</p>
                                <p><b>Email:</b> ".$email."</p>
                                <p><b>Địa chỉ:</b> ".$address."</p>
                                <p><b>Tổng số tiền thanh toán:</b> ".$total_order."đ</p>
                                <p><b>Phương thức thanh toán:</b> ".$payment."</p>
                            ";
                            paymentSuccess($title, $content, $email, $user_name);
                        }
                    }
                    if(!isset($_SESSION['cart']) && (isset($_GET['vi'])) && ($_GET['vi'] == 1)){
                        echo '<div class="successPayment">
                            <h2 style="color: green;">Thanh toán thành công</h2>
                            <h3>Mã đơn hàng: '.$code_order.'</h3>
                            <h3>Tên khách hàng: '.$user_name.'</h3>
                            <h3>Tổng hóa đơn: '.$total_order.'đ</h3>
                            <h4>Thông tin chi tiết đơn hàng sẽ được gửi vào mail của bạn.</h4>
                            <a href="../../index.php">Quay lại trang chủ</a> | <a href="../order.php">Tiếp tục đặt hàng</a>
                        </div>';
                    }
                }
                break;
                case 'payMobile':
                    header("location: ./paymentMobile.php");
                break;
                case 'addCmt':
                    if((isset($_POST['submitCmt'])) && ($_POST['submitCmt'])){  
                        $user_name = $_SESSION['user_name'];
                        $name_pro = $_POST['nameProCmt'];
                        $content = $_POST['contentCmt'];
                        $timeCmt = $_POST['timeCmt'];
                        include_once "../model/connect.php";
                        $conn = connect_db();
                        $sql = "INSERT INTO comment (user_name, name_pro, content, time) VALUES ('$user_name', '$name_pro', '$content', '$timeCmt')";
                        $conn->exec($sql);
                        header("location: {$_SERVER['HTTP_REFERER']}");
                    }
                    break;
            default:
                # code...
                break;
        }
    }
?>