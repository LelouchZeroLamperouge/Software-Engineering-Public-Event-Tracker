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
    $password = password_hash('UA123!', PASSWORD_DEFAULT);
    $organization = 1;
    $admin = 1;
    $notifs = 0;
    $stmt->bind_param("ssssiii",$fname,$lname,$email,$password,$organization,$admin,$notifs);
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


    #   READ  #
    # --------#

    # SELECT ALL EVENTS
    $sql = "SELECT * FROM EVENTS";
    $result = $mysqli->query($sql);

    # VERIFYING PASSWORD
    $plain = 'Hope';
    $email = 'jane.smith@example.com';
    $query = $mysqli->prepare('SELECT PASSWORD FROM USERS WHERE EMAIL = ?');
    if ($query)
    {
        $query->bind_param("s",$email);
        $query->execute();
        $query->bind_result($password);
    }

    if ($query->fetch())
    {
        if (password_verify($plain,$password))
        {
            echo "Correct";
        }
        else
        {
            echo "Incorrect";
        }
    }


    #   UPDATE   #
    #------------#

    # UPDATE AN USER (CHANGE TO MATCH WHAT FIELDS ARE BEING UPDATED)
    # MUST HASH PASSWORD IF CHANGING PASSWORD (LOOK AT CREATING A USER ABOVE)
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

?>