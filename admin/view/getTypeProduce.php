<head>
    <link rel="stylesheet" href="./css/produce.css">
</head>

<body>
    <div class="container">
        <div class="titleProduce">
            <h1>Sản phẩm</h1>
            <hr>
        </div>
        <div class="tools">
            <div class="search-box">
                <div class="search-pro">
                    <label for="searchPro">Tìm sản phẩm</label>
                    <input type="text" name="" id="searchPro" placeholder="Tìm sản phẩm">
                </div>
                <div class="search-select-cate">
                    <label for="btn-sel-cate">Tìm theo danh mục</label>
                    <label for="searchCheckbox" class="labelCheckbox">
                        <input type="checkbox" name="" id="searchCheckbox">
                        <span>Tìm theo danh mục</span>
                        <ul>
                            <li>
                                <a href="../admin/index.php?act=produce">Tất cả sản phẩm</a>
                            </li>
                            <?php
                                $kq = getall_cate();
                                foreach ($kq as $value) {
                                    echo '<li>
                                            <a href="../admin/index.php?act=getTypeProduce&name='.$value['name_cate'].'">'.str_replace('-', ' ', $value['name_cate']).'</a>
                                        </li>';
                                }
                            ?>
                        </ul>
                    </label>
                    </select>
                </div>
            </div>
            <form class="addPro" action="index.php?act=addProduce" method="post" enctype="multipart/form-data">
                <h3 class=""><label for="">Thêm sản phẩm</label></h3>
                <input class="" type="text" name="name_pro" placeholder="Tên sản phẩm">
                <input class="" type="text" name="price" placeholder="Giá sản phẩm">
                <select class="" name="name_cate">
                    <?php
                    $kq = getall_cate();
                    foreach ($kq as $value) {
                        echo "<option value='".$value['name_cate']."'>".str_replace('-',' ', $value['name_cate'])."</option>";
                    }
                    ?>
                </select>
                <!-- <input class="" type="text" name="img" value="" placeholder="Link ảnh"> -->
                <input type="file" name="imgFile" id="imgFile" accept="image/*">
                <button class="" type="submit" name="btnAddProduce">Thêm</button>
            </form>
        </div>
        <div class="titleProduce">
            <h2><?php echo str_replace('-', ' ', $_GET['name']); ?></h2>
            <hr>
        </div>
        <section class="show">
            <table class="">
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
                            Danh mục
                        </th>
                        <th scope="col">
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                if(isset($kqPro) && (count($kqPro) > 0)){
                    $i = 1;
                    foreach($kqPro as $produce){
                    echo'
                        <tr>
                            <th scope="row">'.$i.'</th>
                            <td><img style="width: 60px; height: 60px;" src="../uploads/img/'.$produce['img'].'" alt="'.$produce['name_pro'].'"/></td>
                            <td>'.$produce['name_pro'].'</td>
                            <td><span>'.$produce['price'].'</span></td>
                            <td>'.str_replace('-', ' ', $produce['name_cate']).'</td>
                            <td class="icon"><a class="edit" href="index.php?act=editProduce&id='.$produce['id'].'"><i class="fa-solid fa-file-pen"></i></a> <a class="delete" href="index.php?act=del_produce&id='.$produce['id'].'&img='.$produce['img'].'" type="submit"><i class="fa-solid fa-trash-can"></i></a></td>
                        </tr>';
                        $i++;
                    };
                }
            ?>
                </tbody>
            </table>
        </section>
        <?php
            $kqPro = getall_produce();
            include "./view/showAllProduce.php";
        ?>
    </div>
</body>