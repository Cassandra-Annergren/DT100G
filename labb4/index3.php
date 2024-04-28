
<?php
$page_title = "Del 2"; // Set the title of the page
include("includes/header.php");  
require 'includes/dbinc.php'; // Include the file that connects to the database  
?>

<section class="container">
    <div class="box2">
    <h2>Skapa nytt inlägg</h2>
    <div class="box3">
        <!-- The form used to publish comments -->
        <form action="index3.php" method="POST">
        <p>Namn <input type="text" name="name" size="30"></p>
        <p>Kommentar <textarea name="comment" cols="30" rows="10"></textarea></p>
        <p><input type="submit" value="Spara inlägg"></p>
        </form>
    </div>
    </div>

    <div class="box4">
        <h2>Alla inlägg</h2>
        <?php
        while ($row=mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $mydate = $row['postdate'];
            $mysender = $row['username'];
            $mymessage = $row['post'];
            
            echo "<div><p><b>Datum:</b> " . $mydate . "<br><b>Kreatör:</b> " . $mysender . "<br><b>Kommentar:</b> " . $mymessage . "<br><a href='index3.php?delete=" . $id . "'>Radera</a></p></div>";
        }
        ?>

    </div>
</section>
    

<?php
//Include the footer on the web page
include("includes/footer.php"); 
?>
