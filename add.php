<?php
    session_start();
    $username = "root";
    $password = "admin";
    $database = "chat";
    $server = "127.0.0.1";

    $db_handle = mysql_connect($server, $username, $password);

    //echo ("connection to server opened");

    $db = mysql_select_db($database, $db_handle);
    /*if ($db)
    {
        print "database found";
    }
    else
    {
        print "database not found";
    }*/

    

    $sql = "INSERT INTO messages(username, message) VALUES ('" . $_SESSION['user'] . "', '" . $_POST['message'] . "');";
    

    //echo ($sql);
    $result = mysql_query($sql);

    //echo ($result);

    echo ("<table>");

    $sql = "SELECT * FROM messages;";


    $result = mysql_query($sql);

    while($row = mysql_fetch_assoc($result))
    {
        echo ("<tr><td>".$row['username']."</td><td>".$row['message']."</td></tr>");
    }
    echo ("</table>");

    mysql_close($db_handle);
?>
