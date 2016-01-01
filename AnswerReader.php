<?php

$servername = "webpagesdb.it.auth.gr";
    $username = "nickcave";
    $password = "n!ckc4ve";
    $dbname = "Cave";

$sql = "SELECT Id, AnswerText FROM Answer WHERE QuestionId = " .$_POST["questionId"];

$connection = @mysqli_connect($servername, $username, $password, $dbname);
        
    if (mysqli_connect_errno()){
        echo "error: " . mysqli_connect_errno();
    }
    
    $results = mysqli_query($connection, $sql);
    
    for ($i = 0; $i<mysqli_num_rows($results); $i++){  
        $row = mysqli_fetch_assoc($results);
        echo "<a id=\"answer" .$i . "\" href=\"#\" onclick=\"validateAnswer(event)\" style=\"color: white; font-size: 26px;\" data-answer=\"" .$row["Id"] ."\">".($i+1) .". " .$row["AnswerText"] ."</a> <br /><br />";
    }
mysqli_close($connetion);

?>