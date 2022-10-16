<head>
    <link rel="stylesheet" href="./css/produce.css">
</head>
<style>
.edit i {
    font-size: 18px;
    background-color: #2f9d77;
    padding: 8px 20px;
    border-radius: 5px;
    color: white;
    border: 1px solid #2f9d77;
    transition: all 0.2s ease-in-out;
}

.edit i:hover {
    color: #2f9d77;
    background-color: white;
}

.price span {
    padding: 8px 20px;
    background-color: #2f9d77;
    color: white;
    border-radius: 8px;
}
</style>

<body>
    <div class="container">
        <section class="form">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">
                            STT
                        </th>
                        <th scope="col">
                            Ảnh
                        </th>
                        <th scope="col">
                            Tên sản phẩm
                        </th>
                        <th scope="col">
                            Giá
                        </th>
                        <th scope="col">
                            Giảm giá
                        </th>
                        <th scope="col">
                            Danh mục
                        </th>
                        <th scope="col">
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //* Load product need edit
                        if(isset($kqPro) && (count($kqPro) > 0)){
                            $i = 1;
                            foreach($kqPro as $produce){
                            echo'
                                <tr>
                                    <th scope="row">'.$i.'</th>
                                    <td><img style="width: 50px; height: 50px;" src="../uploads/img/'.$produce['img'].'" alt="'.$produce['name_pro'].'"/></td>
                                    <td>'.$produce['name_pro'].'</td>
                                    <td class="price"><span>'.$produce['price'].'</span></td>
                                    <td class="price"><span>'.$produce['del'].'</span></td>
                                    <td>'.str_replace('-', ' ', $produce['name_cate']).'</td>
                                    <td><a class="edit" href="index.php?act=produce"><i class="fa-solid fa-check-to-slot"></i></a></td>
                                </tr>';
                                $i++;
                            };
                        }
                    ?>
                </tbody>
            </table>
        </section>
        <form id="updatePro" style="width: 30%; display: block; margin: 0 auto;" class="addcate"
            action="index.php?act=editProduce" method="post" enctype="multipart/form-data">
            <h3 class="form_addcate"
                style="border-bottom: 1px solid #2f9d77; font-size: 24px; font-weight: 800; color: #2f9d77; margin-bottom: 1rem;">
                Sửa
                sản phẩm</h3>
            <input type="hidden" name="id_pro" value="<?= $kqPro[0]['id'] ?>">
            <label for="">Tên sản phẩm</label>
            <input class="form_addcate" type="text" name="name_pro" placeholder="<?= $kqPro[0]['name_pro'] ?>"
                value="<?= $kqPro[0]['name_pro'] ?>">
            <label for="">Giá</label>
            <input class="form_addcate" type="text" name="price" placeholder="<?= $kqPro[0]['price'] ?>"
                value="<?= $kqPro[0]['price'] ?>">
            <label for="">Giảm giá</label>
            <input class="form_addcate" type="text" name="del" placeholder="<?= $kqPro[0]['del'] ?>"
                value="<?= $kqPro[0]['del'] ?>">
            <!-- <input class="form_addcate" type="text" name="name_cate" placeholder="Tên danh mục"> -->
            <label for="">Danh mục</label>
            <select class="form_addcate" name="name_cate">
                <?php
                    $kq = getall_cate();
                    foreach ($kq as $value) {
                        echo "<option value='".$value['name_cate']."' ";
                        if ($value['name_cate'] == $kqPro[0]['name_cate']) {
                            echo "selected";
                        }
                        echo ">".str_replace('-', ' ', $value['name_cate'])."</option>";
                    }
                ?>
            </select>
            <label for="">Ảnh</label>
            <input class="form_addcate" type="hidden" name="img" value="<?= $kqPro[0]['img'] ?>" placeholder="Link ảnh">
            <input type="file" name="imgFile" id="imgFile" accept="image/*" value="<?= $kqPro[0]['img'] ?>">
            <button form="updatePro" class="form_addcate" type="submit" name="btnUpdateProduce"
                value="Update">Sửa</button>
        </form>
    </div>
</body>