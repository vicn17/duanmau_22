<head>
    <link rel="stylesheet" href="./css/category.css">
</head>
<style>
.edit i {
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
</style>

<body>
    <div class="container">
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
                        //* Load category need edit
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
                                    <td class="icon"><a class="edit" href="index.php?act=category"><i style="font-size: 18px;" class="fa-solid fa-check-to-slot"></i></a>
                                </tr>';
                                $i++;
                            };
                        }
                    ?>
                </tbody>
            </table>
        </section>
        <form style="display: block; margin: 0 auto;" class="addcate" action="index.php?act=editCate" method="post">
            <h3 class="form_addcate"
                style="border-bottom: 1px solid #2f9d77; font-size: 24px; font-weight: 800; color: #2f9d77; margin-bottom: 1rem;">
                Sửa danh mục</h3>
            <input class="form_addcate" type="text" name="name_cate" placeholder="Tên danh mục"
                value="<?= str_replace('-', ' ', $kq[0]['name_cate']) ?>">
            <input type="hidden" name="id_cate" value="<?= $kq[0]['id'] ?>">
            <select name="status" id="">
                <option value="0">Không hoạt động</option>
                <option value="1">Hoạt động</option>
            </select>
            <button class="form_addcate" type="submit" name="update" value="Update">Update</button>
            <!-- <input type="submit" name="update" value="Update"> -->
        </form>
    </div>
</body>