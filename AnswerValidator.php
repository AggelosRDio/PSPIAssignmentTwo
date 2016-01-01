<?php

$servername = "webpagesdb.it.auth.gr";
    $username = "nickcave";
    $password = "n!ckc4ve";
    $dbname = "Cave";

$sql = "SELECT IsCorrect FROM Answer WHERE Id = " .$_POST["answerId"];

$connection = @mysqli_connect($servername, $username, $password, $dbname);
        
    if (mysqli_connect_errno()){
        echo "error: " . mysqli_connect_errno();
    }
    
    $results = mysqli_query($connection, $sql);
    $isCorrect = 0;
    for ($i = 0; $i<mysqli_num_rows($results); $i++){  
        $row = mysqli_fetch_assoc($results);
        $isCorrect = $row["IsCorrect"];
        //echo "<a id=\"answer" .$i . "\" href=\"#\" onclick=\"validateAnswer(event)\" style=\"color: white; font-size: 26px;\" data-answer=\"" .$row["Id"] ."\">".($i+1) .". " .$row["AnswerText"] ."</a> <br /><br />";
    }
mysqli_close($connetion);

if ($isCorrect == 0){
    echo "<span style=\"color: red; font-size: 40px;\">WRONG ANSWER</span>";
}

if ($isCorrect == 1){
    echo "<span style=\"color: green; font-size: 40px;\">CORRECT ANSWER</span>";
}

?>