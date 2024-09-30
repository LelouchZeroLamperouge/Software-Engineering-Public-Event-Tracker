<?php 
    include_once("config.php");
    $stmt = $mysqli->prepare("UPDATE USERS SET F_NAME=? WHERE USER_ID=?");
    $fname = "Hope";
    $id = 2;
    $stmt->bind_param("si",$fname,$id);
    $stmt->execute();
    echo "Success!";
?>