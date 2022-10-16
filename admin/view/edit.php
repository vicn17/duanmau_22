<body>
    <form action="index.php?act=addcate" method="post">
        <input type="text" name="name_cate">
        <button type="submit" name="add">Add</button>
    </form>
    <?php
    ?>
    <table>
        <tr>
            <th>
                STT
            </th>
            <th>
                Ten danh muc
            </th>
            <th>
                Trang thai
            </th>
        </tr>
        <?php
        //* Load category need edit
        $i = 1;
        foreach($kq as $cate){
            if($cate['status'] == 1){
                $status = 'active';
            }else{
                $status ='unActive';
            }
           echo'
            <tr>
            <th>'.$i.'</th>
            <th>'.$cate['name_cate'].'</th>
            <th>'.$status.'</th>
            <th><a href="index.php?act=edit&id='.$cate['id'].'">edit</a> | <a href="index.php?act=del_cate&id='.$cate['id'].'">Delete</a></th>
            </tr>';
            $i++;
        };
        ?>
    </table>
</body>