<?php
$con = mysql_connect("localhost", "test", "test") or die('Could not connect to server');
mysql_select_db("recipe", $con) or die('Could not connect to database');

$recipeid = $_GET['id'];

$query = "SELECT title,poster,shortdesc,ingredients,directions from recipes where recipeid = $recipeid";

$result = mysql_query($query) or die('Could not find recipe: ' . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC) or die('No records retrieved');
$title = $row['title'];
$poster = $row['poster'];
$shortdesc = $row['shortdesc'];
$ingredients = $row['ingredients'];
$directions = $row['directions'];

$ingredients = nl2br($ingredients);
$directions = nl2br($directions);

echo "<h2>$title</h2>\n";

echo "by $poster <br><br>\n";
echo $shortdesc . "<br><br>\n";
echo "<h3>Ingredients:</h3>\n";
echo $ingredients . "<br><br>\n";

echo "<h3>Directions:</h3>\n";
echo $directions . "\n";
echo "<br><br>\n";

$query = "SELECT count(commentid) from comments where recipeid = $recipeid";
$result = mysql_query($query);
$row=mysql_fetch_array($result);
if ($row[0] == 0)
{
   echo "No comments posted yet.&nbsp;&nbsp;\n";
   echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n";
   echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";
   echo "<hr>\n";
} else
{
   echo $row[0] . "\n";
   echo "&nbsp;comments posted.&nbsp;&nbsp;\n";
   echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n";
   echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";
   echo "<hr>\n";
   echo "<h2>Comments:</h2>\n";

   $query = "SELECT date,poster,comment from comments where recipeid = $recipeid order by commentid desc";

   $result = mysql_query($query) or die('Could not retrieve comments');
   while($row = mysql_fetch_array($result, MYSQL_ASSOC))
   {
       $date = $row['date'];
       $poster = $row['poster'];
       $comment = $row['comment'];
       $comment = nl2br($comment);

       echo $date . " - posted by " . $poster . "\n";
       echo "<br>\n";
       echo $comment . "\n";
       echo "<br><br>\n";
   }
}
?>