<?php
declare(strict_types=1);
error_reporting(E_ALL);

//Creates an global object array
$filearray = [];
global $filearray;

//If the comment field is set
if (isset($_POST['comment'])){
    $date = $_POST['date'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    if (file_exists("guestbook.txt")){
        // TRANSLATES/CONVERTS BACK INTO A PHP VALUE
        $filearray = unserialize(file_get_contents("guestbook.txt"));
        array_push($filearray, "||" . $date . "||" . $name . "||" . $comment . "\n");
    }
    // IF THERE ISN'T ANY DATA IN THE FILE THE ELSE  STATEMENT WILL PUT THE COMMENT IN THE TEXT-FILE
    else {
        array_push($filearray, "||" . $date . "||" . $name . "||" . $comment . "\n");
    }

    // TRANSLATES/CONVERTS BACK INTO A (STORABLE) REPRESENTATION OF THE VALUE
    file_put_contents("guestbook.txt", serialize($filearray));
    header('location: index2.php');
}




