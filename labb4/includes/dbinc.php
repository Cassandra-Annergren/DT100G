<?php
error_reporting(E_ALL); // Error handling

// Create the database connection
$db = new mysqli('localhost', 'admin', 'password', 'guestbook');
    if($db->connect_errno > 0){
        die('Fel vid anslutning [' . $db->connect_error . ']');
         }

// Check if the post button is pressed
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $post = $_POST['post'];
    $postdate = $_POST['postdate'];

    $sql = "INSERT INTO guestbooktable (username, post, postdate) VALUES ('$username', '$post', '$postdate')";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
}

// Check if the delete button is pressed
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM guestbooktable WHERE id=$id";
    $result = mysqli_query($db, $sql);
    header('Location: index3.php');
}

//Collects all the data from the database
$sql_statement = "SELECT * FROM guestbooktable ORDER BY id DESC";
$result = mysqli_query($db, $sql_statement);
mysqli_close($db);
