<div class="tille-home">
    <div class="tille-home-center">
        <h3>ToCoToCo Menu</h3>
        <h1>SẢN PHẨM NỔI BẬT</h1>
    </div>
</div>
<div class="section-menu-card">
    <div class="list-produce">
        <?php
                include "./model/connect.php";
                include "./model/produce.php";
                $kqPro = getall_produce();
                //* Show product by type category
                foreach ($kqPro as $value) {
                    $del = "<del style='color: red;'>".$value['price']."đ</del>";
                    $priceDel = $value['del'];
                    $price = $value['price'];
                    $newPrice = $value['del'] > 0 ? $del." ".$priceDel : $price;
                    if($value['name_cate'] == 'Món-nổi-bật'){
                        echo '
                            <div class="card-produce">
                                <img src="./uploads/img/'.$value['img'].'" alt="'.$value['name_pro'].'" />
                                <div class="card_produce_hover">
                                    <span>'.$value['name_pro'].'</span>
                                    <span>'.$newPrice.'đ</span>
                                    <button>Đặt hàng</button>
                                </div>
                            </div>
                        ';
                    }
                }
            ?>
    </div>
    <a href="<?= isset($user) ? handleLinkUser($user) : "./index.php?page=order" ?>"><button class="btn-bottom">XEM
            THÊM</button></a>
</div>
<div class="clearfix"></div>
<div class="tille-home last_tille_home">
    <div class="tille-home-center">
        <h3>ToCoToCo Store</h3>
        <h1>HỆ THỐNG CỬA HÀNG</h1>
    </div>
</div>
<div id="last_section" class="last-section">
    <div class="iframe_maps">
        <iframe name="iframe" src="" style="border: 0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    <div class="select-store">
        <?php
                include "./model/store.php";
                $store = getStore();
                //* Show store from database
                foreach ($store as $value) {
                    echo '
                        <div class="option-store">
                            <div class="option_store_img">
                                <img src="./view/img/kTmtZly.png" alt="VICN" />
                            </div>
                            <div class="option_store_right">
                                <a href="'.$value['map'].'"
                                    target="iframe"><span class="tille-bold">'.$value['name_store'].'</span></a>
                                <span>'.$value['address'].'</span>
                                <span>'.$value['province'].'</span>
                            </div>
                        </div>
                    ';
                }
            ?>
    </div>
</div>