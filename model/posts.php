<?php
    function addNewPosts($title_posts, $content_posts, $img_post){
        $conn = connect_db();
        $sql = "INSERT INTO posts (title_posts, content_posts, img_posts)
        VALUES ('$title_posts', '$content_posts', '$img_post')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
    function showPosts(){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 0, 10");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $posts = $stmt -> fetchAll();
        return $posts;
    }
    function showAllPosts(){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM posts ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $posts = $stmt -> fetchAll();
        return $posts;
    }
    function delete_posts($id_posts){
        $conn = connect_db();
        $sql = "DELETE FROM posts WHERE id =".$id_posts;
        $conn->exec($sql);
      }
?>