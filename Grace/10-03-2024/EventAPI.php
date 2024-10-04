<?php
    # CREATING A NEW EVENT
    # NOTE: GET DATA FOR DB FROM CREAT EVENT PAGE WHEN USER CREATES EVENT
    $stmt = $mysqli->prepare("INSERT INTO EVENTS (EVENT_NAME,EVENT_DESCR,STREET_ADD,CITY,ZIPCODE,CREATOR,CATEGORY,DATETIME,WEBSITE) VALUES (?,?,?,?,?,?,?,?,?)");
    $event_name = "Birthday Party";
    $event_descr = "BDay party for great-grandma";
    $street_add = "505 willow lane";
    $city = "Fort Smith";
    $zipcode = 72958;
    $creator = 1;
    $category = 1;
    $when = "2024-09-30 15:30:00";
    $website = "www.google.com";
    $stmt->bind_param("ssiss",$event_name,$event_descr,$street_add,$city,$zipcode,$creator,$when,$website);
    $stmt->execute();

    # UPDATE EVENT NAME
    # CHANGE $NAME TO MATCH WHAT'S COMING FROM THE SITE
    $stmt = $mysqli->prepare("UPDATE EVENTS SET EVENT_NAME=? WHERE EVENT_ID=?");
    $name = "Granny's Party";
    $id = 1;
    $stmt->bind_param("si",$name,$id);
    $stmt->execute();

    # UPDATE EVENT DESCRIPTION
    # CHANGE $DESCR TO MATCH WHAT'S COMING FROM THE SITE
    $stmt = $mysqli->prepare("UPDATE EVENTS SET EVENT_DESCR=? WHERE EVENT_ID=?");
    $descr = "Granny's Party";
    $id = 1;
    $stmt->bind_param("si",$descr,$id);
    $stmt->execute();

    # UPDATE EVENT'S STREET ADDRESS
    # CHANGE $ADD TO MATCH WHAT'S COMING FROM THE SITE
    $stmt = $mysqli->prepare("UPDATE EVENTS SET STREET_ADD=? WHERE EVENT_ID=?");
    $add = "506 willow ln";
    $id = 1;
    $stmt->bind_param("si",$add,$id);
    $stmt->execute();

    # UPDATE EVENT'S CITY
    # CHANGE $CITY TO MATCH WHAT'S COMING FROM THE SITE
    $stmt = $mysqli->prepare("UPDATE EVENTS SET CITY=? WHERE EVENT_ID=?");
    $city = "Fort Smith";
    $id = 1;
    $stmt->bind_param("si",$city,$id);
    $stmt->execute();

    # UPDATE EVENT'S ZIPCODE
    # CHANGE $ZIP TO MATCH WHAT'S COMING FROM THE SITE
    $stmt = $mysqli->prepare("UPDATE EVENTS SET ZIPCODE=? WHERE EVENT_ID=?");
    $zip = 71953;
    $id = 1;
    $stmt->bind_param("ii",$zip,$id);
    $stmt->execute();

    # UPDATE EVENT'S CATEGORY
    # CHANGE $CAT TO MATCH WHAT'S COMING FROM THE SITE
    $stmt = $mysqli->prepare("UPDATE EVENTS SET CATEGORY=? WHERE EVENT_ID=?");
    $cat = 5;
    $id = 1;
    $stmt->bind_param("ii",$cat,$id);
    $stmt->execute();

    # UPDATE EVENT'S DATE AND TIME
    # CHANGE $TIME TO MATCH WHAT'S COMING FROM THE SITE
    $stmt = $mysqli->prepare("UPDATE EVENTS SET DATETIME=? WHERE EVENT_ID=?");
    $time = "2024-10-30 15:30:00";
    $id = 1;
    $stmt->bind_param("si",$time,$id);
    $stmt->execute();

    # UPDATE EVENT'S WEBSITE
    # CHANGE $WEBSITE TO MATCH WHAT'S COMING FROM THE SITE
    $stmt = $mysqli->prepare("UPDATE EVENTS SET WEBSITE=? WHERE EVENT_ID=?");
    $website = "arkansas.com";
    $id = 1;
    $stmt->bind_param("si",$website,$id);
    $stmt->execute();
    

    # DELETING AN EVENT
    # CHANGE $ID TO MATCH WHAT'S COMING FROM THE SITE
    $stmt = $mysqli->prepare("DELETE FROM EVENTS WHERE EVENT_ID=?");
    $id=2;
    $stmt->bind_param("i",$id);
    $stmt->execute();
?>