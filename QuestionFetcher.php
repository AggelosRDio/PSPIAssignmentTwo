<?php

    $questions = unserialize(file_get_contents("cache_file_questions"));
    $questionIds = unserialize(file_get_contents("cache_file_question_ids"));
    $questionTexts = unserialize(file_get_contents("cache_file_question_texts"));

    if (!isset($_POST["questionNumber"])){
        echo 'There Was an issue with the request, please try again later';
        exit();
    }

    $nextNo = $_POST["questionNumber"];
    
    echo "<span id=\"questionSpan\" style=\"color: white; font-size: 36px;\" data-index=\"" .$nextNo . "\"data-question=\"" .$questionIds[$questions[$nextNo]] ."\">" . $questionTexts[$questionIds[$questions[$nextNo]]] ."</span>";

?>