<?php include 'config.php'; ?>
<div id="main">
<?php


echo "<h2 align=\"center\">The Latest Recipes</h2><br>";

$query = "SELECT recipeid,title,poster,shortdesc from recipes order by recipeid desc limit 0,5";
$result = mysql_query($query) or die('Could not get recipies: ' . mysql_error());

if (mysql_num_rows($result) == 0)
{
   echo "<h3>Sorry, there are no recipes posted at this time, please try back later.</h3>";
} else
{
   While($row=mysql_fetch_array($result, MYSQL_ASSOC))
   {
       $recipeid = $row['recipeid'];
       $title = $row['title'];
       $poster = $row['poster'];
       $shortdesc = $row['shortdesc'];
       echo "<div id='preview'><a href=\"index.php?content=showrecipe&id=$recipeid\"><h4>$title</h4></a><br/> <font size='0.7em'>Submitted by: <b>$poster</b></font><br/><br/>\n";
       echo"<font size='1em'>$shortdesc</font></div><br/>\n";
   }
}
?>
</div>