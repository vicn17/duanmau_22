<?php
    // include "../model/connect.php";
    // connect_db();
    //* Get and show store from database
    function getStore(){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM shop");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $store = $stmt -> fetchAll();
        return $store;
    }
?>