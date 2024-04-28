<?php
$page_title = "Del 1";
include("includes/header.php");
require 'includes/createpost.php';

$guestbook = file(__DIR__.'/guestbook.txt');

?>

<section class="container">
    <div class="box2">
    <h2>Skapa nytt inlägg</h2>
    <div class="box3">
        <!-- The form used to publish comments -->
        <form action="index2.php" method="POST">
        <p>Namn <input type="text" name="name" size="30"></p>
        <p>Kommentar <textarea name="comment" cols="30" rows="10"></textarea></p>
        <p><input type="submit" value="Spara inlägg"></p>
        <input type="hidden" name="date" value="<?php echo(date('Y-m-d, h:i:s')); ?>">
        </form>
    </div>
    </div>
    <div class='box4'>
        <h2>Alla inlägg</h2>
        <?php
        if (isset($_GET['delete'])){
            $filearray = unserialize(file_get_contents('guestbook.txt'));
            unset($filearray[$_GET['delete']]);
            $filearray = array_values($filearray);
            file_put_contents('guestbook.txt', serialize($filearray));
            header('location: index2.php');
            exit();
        }

        if (is_array($guestbook) && count($guestbook) > 0){
            foreach($guestbook as $key => $line){
                if (strpos($line, '||') > 0 ){
                    $str = explode("||", $line);
                    echo "<div><p><b>Datum:</b> " . $str[1] . "<br><b>Kreatör:</b> " . $str[2] . "<br><b>Kommentar:</b> " . $str[3] . "<br><a href='index2.php?delete=" . $key . "'>Radera</a></p></div>";
                }
            }
        }
        ?>
        <p><a href="guestbook.txt" target="_blank">Visa datafilen</a></p>
    </div>
</section>
    

<?php
//Include the footer on the web page
include("includes/footer.php"); 
?>