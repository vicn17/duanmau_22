<?php
    if(isset($_SESSION['cart'])) include "../../model/connect.php";
    //* Add new product to array session['cart']
    function addToCart($img, $name_pro, $price, $count, $sum){
        session_start();
        $checkCart = 0;
        $index = 0;
        foreach ($_SESSION['cart'] as $value) {
            if($value[1] === $name_pro){
                $value[3] += $count;
                $_SESSION['cart'][$index][3] = $value[3];
                $value[4] += ($price * $count);
                $_SESSION['cart'][$index][4] = $value[4];
                $checkCart = 1;
                break;
            }
            $index++;
        }
        if($checkCart == 0){
            $item = [$img, $name_pro, $price, $count, $sum];
            $_SESSION['cart'][] = $item;
        }
        header("location: ../view/layout/viewCart.php");
    }
    //* Insert information order to database
    function createOrder($code_order, $total_order, $payment, $user_name, $address, $email, $numberPhone){
        $conn = connect_db();
        $sql = "INSERT INTO order_payment (code_order, total_order, payment_method, user_name, address, email, number_phone) VALUES ('$code_order', '$total_order', '$payment', '$user_name', '$address', '$email', '$numberPhone')";
        $conn->exec($sql);
    }
    //* Insert information cart user to database
    function createCartUser($code_order, $img, $name_pro, $price, $amount){
        $conn = connect_db();
        $sql = "INSERT INTO cart (id_order, amount, price, name_pro, img) VALUES ('$code_order', '$amount', '$price', '$name_pro', '$img')";
        $conn->exec($sql);
    }
    function showOrderUser(){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM order_payment WHERE status != 3 GROUP BY id DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $order = $stmt -> fetchAll();
        return $order;
    }
    function showOrderUser3(){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM order_payment WHERE status = 3  GROUP BY id DESC LIMIT 0, 10");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $order = $stmt -> fetchAll();
        return $order;
    }
    function showOneOrderUser($idOrder){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM order_payment WHERE id = '$idOrder'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $order = $stmt -> fetchAll();
        return $order;
    }
    function showCartOrderUser($codeOrder){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM cart WHERE id_order = '$codeOrder'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cart = $stmt -> fetchAll();
        return $cart;
    }
    function statusOrder($value){
        if($value['status'] == 1){
            $value = '<td style="color: green; font-weight: 800;">Đã xác nhận</td>';
        }
        else if($value['status'] == 2){
            $value = '<td style="color: green; font-weight: 800;">Đang giao hàng</td>';
        }
        else if($value['status'] == 3){
            $value = '<td style="color: green; font-weight: 800;">Giao hàng thành công</td>';
        }
        else{
            $value = '<td style="color: red; font-weight: 800;">Chờ xác nhận</td>';
        }
        return $value;
    }
    function updateStatusOrder($statusOrder, $id_order){
        $conn = connect_db();
        $sql = "UPDATE order_payment SET status='".$statusOrder."' WHERE id = ".$id_order;
        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();
    }
?>