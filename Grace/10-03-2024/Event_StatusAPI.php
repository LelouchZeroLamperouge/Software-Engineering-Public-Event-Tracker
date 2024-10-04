<?php
    # CREATE EVENT STATUS
    # NOTE: GET DATA FOR DB FROM EVENT STATUS
    $stmt = $mysqli->prepare("INSERT INTO EVENT_STATUS (USER_ID, EVENT_ID, STATUS_ID) VALUES (?,?,?s)");
    $user = 1;
    $event = 1;
    $status = 1;
    $stmt->bind_param("iii",$user,$event,$status);
    $stmt->execute();

    # UPDATE EVENT STATUS
    # CHANGE $STATUS, $USER, AND $EVENT TO MATCH WHAT'S COMING FROM THE SITE
    $stmt = $mysqli->prepare("UPDATE EVENT_STATUS SET STATUS=? WHERE USER_ID=? AND EVENT_ID=?");
    $user = 1;
    $event = 1;
    $status = 2;
    $stmt->bind_param("iii",$user,$event,$status);
    $stmt->execute();
?>