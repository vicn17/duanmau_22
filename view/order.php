<?php
    session_start();
    if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product</title>
    <link rel="shortcut icon" href="./img/image-removebg-preview.png" />
    <link rel="stylesheet" href="./css/order.css">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/base.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <!-- <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch&display=swap" rel="stylesheet">
</head>
<?php 
    include "../controller/controlOrder.php";
    include "../model/connect.php";
    include "../model/category.php";
    include "../model/produce.php";
    connect_db();
    $kq = getall_cate();
    $kqPro = getall_produce();
    $cmt = showCmtUser();
?>

<body>
    <div class="container">
        <?php
            include './layout/order_login.php';
        ?>
        <div class="contentProduce">
            <div class="childrenContent">
                <?php
                    //* Show product from database
                    $count = 1;
                    foreach ($kq as $value) {
                        if($value['status'] == 1){
                            echo '<details open="false">
                                <summary>
                                    '.str_replace('-', ' ', $value['name_cate']).'
                                </summary>
                                <div class="listProduce">';
                                    foreach($kqPro as $pro){
                                        $del = "<del style='color: red;'>".$pro['price']."đ</del>";
                                        $priceDel = $pro['del'];
                                        $price = $pro['price'];
                                        $newPrice = $pro['del'] > 0 ? $del." ".$priceDel : $price;
                                        $newPriceInp = $pro['del'] > 0 ? $priceDel : $price;
                                        if($pro['name_cate'] == $value['name_cate']){
                                            echo '
                                                <div class="cardProduce">
                                                    <input type="checkbox" id="checkbox'.$count.'" />
                                                    <div class="divFill">
                                                        <label for="checkbox'.$count.'" class="fill"> </label>
                                                        <div class="contentFillPro">
                                                            <label for="checkbox'.$count.'" class="close"><i class="fa-solid fa-circle-xmark"></i></label>
                                                            <form id="formFill'.$count.'" class="formFill" action="'.$_SERVER['PHP_SELF'].'?page=viewCart&account='.isset($_SESSION['user_name']).'" method="post">
                                                                <input name="imgCart" type="hidden" value="'.$pro['img'].'">
                                                                <input name="nameProCart" type="hidden" value="'.$pro['name_pro'].'">
                                                                <input name="priceCart" type="hidden" value="'.$newPriceInp.'">
                                                                <img src="../uploads/img/'.$pro['img'].'" alt="" />
                                                                <div class="titleContent">
                                                                    <span>'.$pro['name_pro'].'</span>
                                                                    <span class="priceFill">'.$newPrice.'đ</span>
                                                                    <div class="countCar">
                                                                        <label for="">Số lượng: </label>
                                                                        <input name="countCart" type="number" value="1" min="1" max="100">
                                                                    </div>
                                                                    <button name="addCart" form="formFill'.$count.'" type="submit">Thêm vào giỏ hàng</button>
                                                                </div>
                                                            </form>
                                                            <h4>Đánh giá</h4>';
                                                            foreach ($cmt as $valueCmt) {
                                                                if($valueCmt['name_pro'] == $pro['name_pro']){
                                                                    echo '<div class="showCmtUser" style="box-shadow: 0 1px 2px #2f9d77; padding: 10px; margin: 0 auto; margin-top: 5px; border-radius: 5px; width: 95%;">
                                                                    <label for="" style="display: block; text-align: start; font-weight: 600; color: #2f9d77;">'.$valueCmt['user_name'].'</label>
                                                                    <input type="text" value="'.$valueCmt['content'].'" style="width: 95%; font-size: 17px; background-color: #cbcbcb; border: 1px solid transparent; padding: 10px; border-radius: 5px; color: black;" disabled>
                                                                </div>';
                                                                }
                                                            }
                                                            if(isset($_SESSION['user_name'])){
                                                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                                                echo '<form id="formCmt'.$count.'" class="formCmt" action="'.$_SERVER['PHP_SELF'].'?page=addCmt" method="post">
                                                                    <textarea name="contentCmt" id="" rows="3" style="width: 100%;" placeholder="Comment..." required></textarea>
                                                                    <input type="hidden" name="nameProCmt" id="" value="'.$pro['name_pro'].'">
                                                                    <input type="hidden" name="timeCmt" id="" value="'.date('Y/m/d').' at '.date('H:i:s').'">
                                                                    <button form="formCmt'.$count.'" name="submitCmt" value="submit" type="submit" style="display: inline; padding: 0 1rem"><i class="fa-solid fa-paper-plane"></i></button>            
                                                                </form>';
                                                            }
                                                        echo '</div>
                                                    </div>
                                                    <label for="checkbox'.$count.'" class="boxCard">
                                                            <img src="../uploads/img/'.$pro['img'].'" alt="" />
                                                            <div class="titleCard">
                                                                <span>'.$pro['name_pro'].'</span>
                                                            </div>
                                                            <div class="price">
                                                                <span>'.$newPrice.'đ</span>
                                                            </div>
                                                    </label>
                                                    </div>
                                            ';
                                        }
                                        $count++;
                                    }
                            echo '</div>
                            </details>';
                        }
                    }
                ?>
            </div>
        </div>
        <footer>
            <?php
                include "./layout/footer.php";
            ?>
        </footer>
    </div>
</body>