<?php

    $servername = "webpagesdb.it.auth.gr";
    $username = "nickcave";
    $password = "n!ckc4ve";
    $dbname = "Cave";

    $offset = 0;

    if (isset($_POST["page"])){
        $offset = ($_POST["page"]-1) * 10;
    }
    
    if ($offset < 0) $offset = 0;
    
    $sql = "SELECT CommentText, CommentDate, CommentBy FROM Comments ORDER BY CommentDate DESC LIMIT " . $offset . ", 10";
    
    $sqlCount = "SELECT COUNT(*) AS ItemCount FROM Comments";
    
    $connection = @mysqli_connect($servername, $username, $password, $dbname);
        
    if (mysqli_connect_errno()){
        echo "error: " . mysqli_connect_errno();
    }
    
    $itemCount = 10;
    
    $countResult = mysqli_query($connection, $sqlCount);
    
    for ($i = 0; $i<mysqli_num_rows($countResult); $i++){
        $countNum = mysqli_fetch_assoc($countResult);
        $itemCount = $countNum["ItemCount"];
    }
    
    
    $results = mysqli_query($connection, $sql);
    $oneFound = false;
    for ($i = 0; $i<mysqli_num_rows($results); $i++){
        
        if($oneFound != true)
        $oneFound = true;
        
        $row = mysqli_fetch_assoc($results);
        echo '<p style="color: white; border-style: solid; border-color:#287EC7; height: 50px;"><span style="font-size: 16px;">' .$row['CommentText'] .'</span><br /><br /> <span style="color: white; font-size: 10px;">Posted On ' . $row["CommentDate"] ." - By " .$row["CommentBy"]."</span></p><br /><br />";
    }
    
    $next = $_POST["page"];
    $prev = $_POST["page"];
    $navback = "";
    $navfwd = "";
    
    if ($oneFound == true){
        $next = $_POST["page"]+1;            
    }
    
    if($prev > 1){
        $prev = $prev - 1;
        $navback = "<a style=\"color: white;\" data-page=\"" . $prev ."\" href=\"#\"onclick=\"GoToPreviousPage(event)\" id=\"previous\">Previous Page</a>";
    }
    
    if($itemCount > ($_POST["page"] * 10))
    {
        $navfwd = "<a style=\"color: white;\" data-page=\"".$next ."\" href=\"#\" onclick=\"GoToNextPage(event)\" id=\"next\">Next Page</a>";
    }
    
     
    
    
    echo $navback . $navfwd . "<br/><br/>";
        
    mysqli_close($connetion);

?>