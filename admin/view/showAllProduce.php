<div class="titleProduce">
    <h2>Tất cả sản phẩm</h2>
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
                            <td class="icon"><a class="edit" href="index.php?act=editProduce&id='.$produce['id'].'"><i class="fa-solid fa-file-pen"></i></a> <a class="delete" href="index.php?act=del_produce&id='.$produce['id'].'" type="submit"><i class="fa-solid fa-trash-can"></i></a></td>
                        </tr>';
                        $i++;
                    };
                }
            ?>
        </tbody>
    </table>
</section>