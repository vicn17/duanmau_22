<?php
  //* Get and show all category
  function getall_cate(){
      $conn = connect_db();
      $stmt = $conn->prepare("SELECT * FROM category");
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $kq = $stmt -> fetchAll();
      return $kq;
  }
  //* Get and show one category by id
  function getone_cate($id_cate){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM category WHERE id=".$id_cate);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt -> fetchAll();
    return $kq;
  }
  //* Add new category to database
  function addcate($name_cate, $status){
      $conn = connect_db();
      $sql = "INSERT INTO category (name_cate, status)
    VALUES ('$name_cate', '$status')";
    // use exec() because no results are returned
    $conn->exec($sql);
  }
  //* Delect category by id
  function delete_cate($id_cate){
    $conn = connect_db();
    $sql = "DELETE FROM category WHERE id =".$id_cate;
    $conn->exec($sql);
  }
  //* Update category by id
  function edit_cate($name_cate, $id_cate, $status){
    $conn = connect_db();
    $sql = "UPDATE category SET name_cate ='".$name_cate."', status='".$status."' WHERE id = ".$id_cate;

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
  }
?>