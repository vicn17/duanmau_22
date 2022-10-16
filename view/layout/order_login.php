<header>
    <nav>
        <div class="logo_header">
            <a href="<?= $_SESSION['linkHome'] ?>">VICN</a>
        </div>
        <div class="search">
            <div class="search_glass">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <input type="text" placeholder="Search.." />
        </div>
        <?php
            //* Check isset user to attach the link
            if(isset($_SESSION['user_name'])){
                echo '<div class="location_header">Xin chào - '.$_SESSION['user_name'].'</div>';
            }else{
                echo '<div class="btn_header">
                        <a href="./login.php">Đăng nhập</a>
                    </div>';
            }
            function changeViewCart(){
                if(isset($_SESSION['user_name'])){
                    if(count($_SESSION['cart']) > 0){
                        if(isset($_SESSION['linkCart'])){
                            $link = $_SESSION['linkCart'];
                        }
                        else{
                            $link = "./layout/viewCart.php";
                        }
                    }
                    elseif(!isset($_SESSION['cart'])){
                        $link = "./order.php";
                    }
                    else{
                        $link = "./order.php";
                    }
                }
                else{
                    $link = "./login.php";
                }
                return $link;
            }
        ?>
        <a class="addToCart" href="<?= changeViewCart() ?>">
            <i class="fa-solid fa-cart-shopping"></i>
            <?php 
                if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)){
                    echo '<span>'.count($_SESSION['cart']).'</span>';
                }
                // else if(!isset($_SESSION['cart']) || ($_SESSION['cart'] == null)){
                //     echo '<span>0</span>';
                // }
            ?>
        </a>
    </nav>
</header>