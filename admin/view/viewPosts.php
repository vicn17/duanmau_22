<head>
    <link rel="stylesheet" href="./css/posts.css">
</head>

<body>
    <div class="container">
        <div class="titlePosts">
            <h1>Bài viết</h1>
            <hr>
        </div>
        <div class="" style="width: 100%; height: 10rem; background-color: aliceblue; margin: 2rem 0;"></div>
        <div class="wrapperPosts">
            <form class="formPosts" id="formPosts" action="<?= $_SERVER['PHP_SELF'] ?>?act=addPosts" method="POST"
                enctype="multipart/form-data">
                <h2>Bài viết mới</h2>
                <label for="">Ảnh bài viết</label>
                <input type="file" name="imgPosts" id="" required>
                <label for="">Tiêu đề</label>
                <input type="text" name="titlePosts" id="" required>
                <label for="">Nội dung</label>
                <textarea name="contentPosts" id="" rows="18" required></textarea>
                <button form="formPosts" name="submitPosts" type="submit" value="submitPosts">Thêm bài viết</button>
            </form>
            <div class="listCardPosts">
                <div class="titleListCardPosts"
                    style="display: flex; align-items: center; justify-content: space-between;">
                    <h2>Bài viết đã đăng</h2><a href="" style="margin-right: 20px; color: green; font-size: 18px;">Tất
                        cả bài viết</a>
                </div>
                <div class="listPosts">
                    <?php
                        $posts = showPosts();
                        foreach ($posts as $value) {
                            echo '<div class="cardPosts">
                                    <div class="fillPostsHover hoverLeft">
                                        <a href="'.$_SERVER['PHP_SELF'].'?act=del_posts&id='.$value['id'].'&imgPosts='.$value['img_posts'].'"><i class="fa-regular fa-trash-can"></i></a>
                                    </div>
                                    <div class="fillPostsHover hoverRight">
                                        <a href=""><i class="fa-solid fa-pencil"></i></a>
                                    </div>
                                    <img src="../uploads/imgPosts/'.$value['img_posts'].'" alt="">
                                    <div class="title"><a href="">'.str_replace('-', ' ', $value['title_posts']).'</a></div>
                                    <div class="content">'.$value['content_posts'].'</div>
                                </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>