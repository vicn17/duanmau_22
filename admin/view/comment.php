<head>
    <link rel="stylesheet" href="./css/category.css">
</head>

<body>
    <div class="container">
        <div class="titleCate">
            <h1>Bình luận</h1>
            <hr>
        </div>
        <div class="formAddCate">
            <form id="searchCmt" class="addcate" action="index.php?act=searchCmt" method="post">
                <label for="">
                    <h4 class="">Tìm bình luận</h4>
                </label>
                <input class="" type="text" name="user_name" placeholder="Tên khách hàng">
                <select name="name_pro" id="">
                    <option value="null">Tất cả bình luận theo sản phẩm</option>
                    <?php
                        foreach ($groupByCmt as $value) {
                            echo "<option value='{$value['name_pro']}'>{$value['name_pro']}</option>";
                        }
                    ?>
                </select>
                <button form="searchCmt" class="" type="submit" name="submitSearchCmt">Tìm</button>
            </form>
        </div>
        <section class="form">
            <table class="">
                <thead>
                    <tr>
                        <th scope="col">
                            STT
                        </th>
                        <th scope="col">
                            Tên khách hàng
                        </th>
                        <th scope="col">
                            Bình luận
                        </th>
                        <th scope="col">
                            sản phẩm
                        </th>
                        <th scope="col">
                            Thời gian
                        </th>
                        <th scope="col">
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //* Load category from table category(database)
                        if(isset($cmt) && (count($cmt) > 0)){
                            $i = 1;
                            foreach($cmt as $value){
                            echo'
                                <tr>
                                    <th scope="row">'.$i.'</th>
                                    <th>'.$value['user_name'].'</th>
                                    <td>'.$value['content'].'</td>
                                    <td>'.$value['name_pro'].'</td>
                                    <td>'.$value['time'].'</td>
                                    <td class="icon"><a class="edit" href="#"><i class="fa-solid fa-file-pen"></i></a> <a class="delete" href="index.php?act=delCmt&id='.$value['id'].'" type="submit"><i class="fa-solid fa-trash-can"></i></a></td>
                                </tr>';
                                $i++;
                            };
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </div>

</body>