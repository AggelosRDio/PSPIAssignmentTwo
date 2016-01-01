<?php

$servername = "webpagesdb.it.auth.gr";
    $username = "nickcave";
    $password = "n!ckc4ve";
    $dbname = "Cave";

$questions = array();

$questionIds = array();
$questionTexts = array();

$sql = "SELECT Id, QuestionTest FROM Question";

$connection = @mysqli_connect($servername, $username, $password, $dbname);
        
    if (mysqli_connect_errno()){
        echo "error: " . mysqli_connect_errno();
    }
    
    $results = mysqli_query($connection, $sql);
    
    for ($i = 0; $i<mysqli_num_rows($results); $i++){  
        $row = mysqli_fetch_assoc($results);
        $questionIds[$i] = $row['Id'];
        $questionTexts[$i] = $row['QuestionTest']; 
    }
mysqli_close($connetion);


$arrlength = count($questionIds);

for($x = 0; $x < $arrlength; $x++) {
    $questions[$x] = $questionIds[$x];
}

shuffle($questions);

file_put_contents("cache_file_questions", serialize($questions));
file_put_contents("cache_file_question_ids", serialize($questionIds));
file_put_contents("cache_file_question_texts", serialize($questionTexts));

?>