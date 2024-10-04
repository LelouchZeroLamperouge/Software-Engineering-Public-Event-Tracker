<?php
    # CREATING A NEW USER
    # NOTE: GET DATA FOR DB FROM CREATE ACCOUNT PAGE WHEN USER SIGNS UP
    $stmt = $mysqli->prepare("INSERT INTO USERS (F_NAME,L_NAME,EMAIL,PASSWORD,ORGANIZATION,ADMIN,NOTIFICATIONS) VALUES (?,?,?,?,?,?,?)");
    $fname = "Grace";
    $lname = "Carmack";
    $email = "wassup@gmail.com";
    $password = password_hash('abc12345', PASSWORD_DEFAULT);
    $organization = 1;
    $admin = 1;
    $notifs = 0;
    $stmt->bind_param("ssssiii",$fname,$lname,$email,$password,$organization,$admin,$notifs);
    $stmt->execute();

    # VERIFYING PASSWORD
    # NOTE: CHANGE $PLAIN AND $EMAIL VARIABLES TO MATCH WHAT IS COMING FROM THE LOGIN PAGE WHEN USER TRIES TO LOG IN
    $plain = 'password1';
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
        # IF PASSWORD IS VERIFIED IT WILL SHOW CORRECT. IF NOT, IT WILL SHOW INCORRECT.
        if (password_verify($plain,$password))
        {
            echo "Correct";
        }
        else
        {
            echo "Incorrect";
        }
    }

    # UPDATE USER'S FIRST NAME
    # CHANGE $FNAME AND $EMAIL TO MATCH DATA COMING FROM SITE
    $stmt = $mysqli->prepare("UPDATE USERS SET F_NAME=? WHERE EMAIL=?");
    $fname = "Grace";
    $email = 'wassup@gmail.com';
    $stmt->bind_param("ss",$fname,$email);
    $stmt->execute();

    # UPDATE USER'S LAST NAME
    # CHANGE $LNAME AND $EMAIL TO MATCH DATA COMING FROM SITE
    $stmt = $mysqli->prepare("UPDATE USERS SET L_NAME=? WHERE EMAIL=?");
    $lname = "Carmack";
    $email = 'wassup@gmail.com';
    $stmt->bind_param("ss",$lname,$email);
    $stmt->execute();

    # UPDATE USER'S EMAIL
    # CHANGE $EMAIL_UPT AND $EMAIL_CUR TO MATCH DATA COMING FROM SITE
    $stmt = $mysqli->prepare("UPDATE USERS SET EMAIL=? WHERE EMAIL=?");
    $email_upt = "wassup2@gmail.com";
    $EMAIL_CUR = 'wassup@gmail.com';
    $stmt->bind_param("ss",$email_upt,$EMAIL_CUR);
    $stmt->execute();

    # UPDATE USER'S PASSWORD
    # CHANGE $PLAIN TO MATCH DATA COMING FROM SITE
    $stmt = $mysqli->prepare("UPDATE USERS SET PASSWORD=? WHERE EMAIL=?");
    $plain = "password1";
    $email = 'wassup@gmail.com';
    $hashed = password_hash($plain, PASSWORD_DEFAULT);
    $stmt->bind_param("ss",$hashed,$email);
    $stmt->execute();

    # UPDATE USER'S ACCOUNT MODE
    # FALSE = NORMAL USER (use the digit 0) | TRUE = CREATOR (use the digit 1)
    # CHANGE $ORG TO MATCH WHAT'S COMING FROM SITE
    $stmt = $mysqli->prepare("UPDATE USERS SET ORGANIZATION=? WHERE EMAIL=?");
    $org = 1;
    $email = 'wassup@gmail.com';
    $stmt->bind_param("is",$org,$email);
    $stmt->execute();

    # UPDATE USER'S ADMINISTRATOR STATUS
    # FALSE = NORMAL USER (use the digit 0) | TRUE = ADMIN (use the digit 1)
    # CHANGE $ADMIN TO MATCH WHAT'S COMING FROM SITE
    $stmt = $mysqli->prepare("UPDATE USERS SET ADMIN=? WHERE EMAIL=?");
    $admin = 1;
    $email = 'wassup@gmail.com';
    $stmt->bind_param("is",$admin,$email);
    $stmt->execute();

    # UPDATE USER'S NOTIFICATION SETTINGS
    # FALSE = NOTIFICATIONS OFF (use the digit 0) | TRUE = NOTIFICATIONS ON (use the digit 1)
    # CHANGE $NOTIFS TO MATCH WHAT'S COMING FROM THE SITE
    $stmt = $mysqli->prepare("UPDATE USERS SET NOTIFICATIONS=? WHERE EMAIL=?");
    $notifs = 1;
    $email = 'wassup@gmail.com';
    $stmt->bind_param("is",$notifs,$email);
    $stmt->execute();

    # DELETE A USER
    # NOTE: CAN'T BE DELETED UNTIL ANY EVENTS THEY'RE TIED TO ARE DELETED
    $stmt = $mysqli->prepare("DELETE FROM USERS WHERE USER_ID=?");
    $id=2;
    $stmt->bind_param("i",$id);
    $stmt->execute();
?>