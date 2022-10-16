<head>
    <link rel="stylesheet" href="./css/category.css">
</head>

<body>
    <div class="container">
        <div class="titleCate">
            <h1>Danh mục</h1>
            <hr>
        </div>
        <div class="formAddCate">
            <form class="addcate" action="index.php?act=addcate" method="post">
                <label for="">
                    <h4 class="">Thêm danh mục</h4>
                </label>
                <input class="" type="text" name="name_cate" placeholder="Tên danh mục">
                <select name="status" id="">
                    <option value="0">Không hoạt động</option>
                    <option value="1">Hoạt động</option>
                </select>
                <button class="" type="submit" name="add">Thêm</button>
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
                            Tên danh mục
                        </th>
                        <th scope="col">
                            Tình trạng
                        </th>
                        <th scope="col">
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //* Load category from table category(database)
                        if(isset($kq) && (count($kq) > 0)){
                            $i = 1;
                            foreach($kq as $cate){
                                if($cate['status'] == 1){
                                    $status = '<td class="green_action">Hoạt động</td>';
                                }else{
                                    $status ='<td class="red_action">Không hoạt động</td>';
                                }
                            echo'
                                <tr>
                                    <th scope="row">'.$i.'</th>
                                    <td>'.str_replace('-',' ', $cate['name_cate']).'</td>
                                    '.$status.'
                                    <td class="icon"><a class="edit" href="index.php?act=editCate&id='.$cate['id'].'"><i class="fa-solid fa-file-pen"></i></a> <a class="delete" href="index.php?act=del_cate&id='.$cate['id'].'" type="submit"><i class="fa-solid fa-trash-can"></i></a></td>
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