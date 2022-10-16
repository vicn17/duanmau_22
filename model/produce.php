<?php
  //* Get and show all product from database
  function getall_produce(){
      $conn = connect_db();
      $stmt = $conn->prepare("SELECT * FROM product ORDER BY id DESC");
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $kqPro = $stmt -> fetchAll();
      return $kqPro;
  }
  //* Get and show one product from database
  function getone_produce($id_pro){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM product WHERE id=".$id_pro);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqPro = $stmt -> fetchAll();
    return $kqPro;
  }
  //* Add new product to database
  function addProduce($name_pro, $price, $name_cate, $img){
      $conn = connect_db();
      $sql = "INSERT INTO product (name_pro, price, name_cate, img) VALUES ('$name_pro', '$price', '$name_cate', '$img')";
      $conn->exec($sql);
  }
  //* Delect product by id
  function delete_produce($id_pro){
    $conn = connect_db();
    $sql = "DELETE FROM product WHERE id =".$id_pro;
    $conn->exec($sql);
  }
  //* Update product by id
  function edit_produce($name_pro, $price, $del, $name_cate, $img, $id_pro){
    $conn = connect_db();
    $sql = "UPDATE product SET name_pro ='".$name_pro."', price = '".$price."', del = '".$del."', name_cate ='".$name_cate."', img = '".$img."' WHERE id = ".$id_pro;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  }
  //* Get and show product by type name category
  function getType_produce($name_cate){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM product WHERE name_cate='".$name_cate."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqPro = $stmt -> fetchAll();
    return $kqPro;
  }
  //* Get and show count product from database
  function countProduce(){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT COUNT(*) FROM product");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt -> fetchColumn();
    return $count;
  }
  //* Get and show count user from database
  function countCustomer(){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT COUNT(*) FROM account");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt -> fetchColumn();
    return $count;
  }
  function showCmtUser(){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM comment ORDER BY id DESC LIMIT 0,10");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $cmt = $stmt -> fetchAll();
    return $cmt;
  }
  function showCmtUserUnlimited(){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM comment ORDER BY id DESC");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $cmt = $stmt -> fetchAll();
    return $cmt;
  }
  function groupByNameProCmt(){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT name_pro FROM comment GROUP BY name_pro ORDER BY id DESC");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $groupByCmt = $stmt -> fetchAll();
    return $groupByCmt;
  }
  function searchCmt($user_name, $name_pro){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM comment WHERE user_name = '$user_name' $name_pro ORDER BY id DESC");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $cmt = $stmt -> fetchAll();
    return $cmt;
  }
  function delete_cmt($id_cmt){
    $conn = connect_db();
    $sql = "DELETE FROM comment WHERE id =".$id_cmt;
    $conn->exec($sql);
  }
?>