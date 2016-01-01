<?php
 
 
 $dateParam = date("Y-m-d");
 
 if(isset($_POST["comment"])){
 
    $email = "";
    if ($_POST["email"] === "") $email = "Anonymous@nomail.com";
    else $email = $_POST["email"] . '<br/>';
    
    $servername = "webpagesdb.it.auth.gr";
    $username = "nickcave";
    $password = "n!ckc4ve";
    $dbname = "Cave";
        
    $sql = "INSERT INTO Comments (CommentText, CommentDate, CommentBy) VALUES ('" .$_POST["comment"]."', '" . $dateParam . "', '" . $_POST["email"] ."')";
    echo $sql;
    $connection = @mysqli_connect($servername, $username, $password, $dbname);
        
    if (mysqli_connect_errno()){
        echo "error: " . mysqli_connect_errno();
    }
        
    mysqli_query($connection, $sql);
        
    mysqli_close($connetion);
    
 }
 
 ?>