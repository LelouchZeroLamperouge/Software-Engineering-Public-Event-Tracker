# THIS CODE IS NOT TO BE RAN IN THIS FILE.
# IT IS TO BE COPIED AND PASTED ELSEWHERE TO BE EDITED AND RAN.

<?php
    #   CREATE   #
    #------------#

    # CREATE A NEW USER
    $stmt = $mysqli->prepare("INSERT INTO USERS (F_NAME,L_NAME,EMAIL,PASSWORD,ORGANIZATION,ADMIN,NOTIFICATIONS) VALUES (?,?,?,?,?,?,?)");
    $fname = "Grace";
    $lname = "Carmack";
    $email = "wassup@gmail.com";
    $password = "UA123!";
    $organization = 1;
    $admin = 1;
    $notifs = 0;
    $stmt->bind_param("ssssiii",$fname,$lname,$email,$password,$organization,$admin,$notifs);
    $stmt->execute();

    # CREATE A NEW STATUS
    $stmt = $mysqli->prepare("INSERT INTO STATUS (STATUS_DESCR) VALUES (?)");
    $status = "Not Going";
    $stmt->bind_param("s",$status);
    $stmt->execute();

    # CREATE A NEW EVENT
    $stmt = $mysqli->prepare("INSERT INTO EVENTS (EVENT_NAME,EVENT_DESCR,CREATOR,DATETIME,WEBSITE) VALUES (?,?,?,?,?)");
    $event_name = "Birthday Party";
    $event_descr = "BDay party for great-grandma";
    $creator = 1;
    $when = "2024-09-30 15:30:00";
    $website = "www.google.com";
    $stmt->bind_param("ssiss",$event_name,$event_descr,$creator,$when,$website);
    $stmt->execute();

    # CREATE A NEW EVENT_STATUS
    $stmt = $mysqli->prepare("INSERT INTO EVENT_STATUS (USER_ID,EVENT_ID,STATUS_ID) VALUES (?,?,?)");
    $user = 1;
    $event = 1;
    $status = 2;
    $stmt->bind_param("iii",$user,$event,$status);
    $stmt->execute();


    #   RETRIEVE  #
    # ------------#

    # SELECT ALL RECORDS FROM USERS
    $sql = "SELECT * FROM USERS";
    $result = $mysqli->query($sql);

    # SELECT ALL RECORDS FROM EVENTS
    $sql = "SELECT * FROM EVENTS";
    $result = $mysqli->query($sql);

    # SELECT ALL RECORDS FROM STATUS
    $sql = "SELECT * FROM STATUS";
    $result = $mysqli->query($sql);

    # SELECT ALL RECORDS FROM EVENT_STATUS
    $sql = "SELECT * FROM EVENT_STATUS";
    $result = $mysqli->query($sql);


    #   UPDATE   #
    #------------#

    # UPDATE AN USER (CHANGE TO MATCH WHAT FIELDS ARE BEING UPDATED)
    $stmt = $mysqli->prepare("UPDATE USERS SET F_NAME=? WHERE USER_ID=?");
    $fname = "Hope";
    $id = 2;
    $stmt->bind_param("si",$fname,$id);
    $stmt->execute();

    # UPDATE AN EVENT (CHANGE TO MATCH WHAT FIELDS ARE BEING UPDATED)
    $stmt = $mysqli->prepare("UPDATE EVENTS SET EVENT_NAME=? WHERE EVENT_ID=?");
    $name = "Granny's Party";
    $id = 1;
    $stmt->bind_param("si",$name,$id);
    $stmt->execute();

    # UPDATE EVENT STATUS
    $stmt = $mysqli->prepare("UPDATE EVENT_STATUS SET STATUS_ID=? WHERE EVENT_ID=? AND USER_ID=?");
    $status = 1;
    $user_id = 1;
    $event_id = 1;
    $stmt->bind_param("iii",$status,$event_id,$user_id);
    $stmt->execute();

    # UPDATE A STATUS
    $stmt = $mysqli->prepare("UPDATE STATUS SET STATUS_DESCR=? WHERE STATUS_ID=?");
    $id = 1;
    $descr = "test";
    $stmt->bind_param("si",$descr, $id);
    $stmt->execute();


    #   DELETE  #
    #-----------#

    # DELETE A USER (CAN'T BE DELETED UNTIL ANY EVENTS THEY'RE TIED TO ARE DELETED)
    $stmt = $mysqli->prepare("DELETE FROM USERS WHERE USER_ID=?");
    $id=2;
    $stmt->bind_param("i",$id);
    $stmt->execute();

    # DELETE AN EVENT 
    $stmt = $mysqli->prepare("DELETE FROM EVENTS WHERE EVENT_ID=?");
    $id=2;
    $stmt->bind_param("i",$id);
    $stmt->execute();

    # DELETE AN EVENT STATUS
    $stmt = $mysqli->prepare("DELETE FROM EVENT_STATUS WHERE EVENT_ID=? AND USER_ID=?");
    $user=1;
    $event=1;
    $stmt->bind_param("ii",$event,$user);
    $stmt->execute();

    # DELETE A STATUS
    $stmt = $mysqli->prepare("DELETE FROM STATUS WHERE STATUS_ID=?");
    $status=1;
    $stmt->bind_param("i",$status);
    $stmt->execute();

?>