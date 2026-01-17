<?php include 'config.php'; ?>
<div id="news">

<h3>What's Cookin'</h3>
<?php


$query = "SELECT title,date,article from news order by date desc limit 0,2";
$result = mysql_query($query) or die('Sorry, could not get news articles');

while($row=mysql_fetch_array($result, MYSQL_ASSOC))
{
    $date = $row['date'];
    $title = $row['title'];
    $article = $row['article'];
    echo "<br>$date - <b>$title</b><br>$article<br><br>";
}


?><br /><a href="http://adminspot.net/" target="_blank">
<img src="http://i51.tinypic.com/2a0nxur.jpg" alt="AdminSpot Banner!" />
</a>
</div>
<br id="clear"></br>