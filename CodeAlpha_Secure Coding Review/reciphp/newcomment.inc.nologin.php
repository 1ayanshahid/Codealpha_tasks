<?php
$recipeid = $_GET['id'];
echo "<form action=\"index.php\" method=\"post\">\n";
echo "<h2>Enter your comment</h2>";
echo "<textarea rows=\"10\" cols=\"50\" name=\"comment\"></textarea><br>\n";

echo "Submitted by:<input type=\"text\" name=\"poster\"><br>\n";
echo "<input type=\"hidden\" name=\"recipeid\" value=\"$recipeid\">\n";
echo "<input type=\"hidden\" name=\"content\" value=\"addcomment\">\n";
echo "<br><input type=\"submit\" value=\"Submit\">\n";
echo "</form>\n";
?>