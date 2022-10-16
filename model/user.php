<?php
    //* Get infor user(user name, password)
    function check_user($user, $pass){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM account WHERE user_name = '".$user."' AND pass = '".$pass."'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt -> fetchAll();
        return $kq[0]['type'];
    }
?>