<?php include 'config.php'; ?>
<div id="main">
<div id='preview'>
<?php


    $search = $_GET['searchFor'];
    $query = "SELECT recipeid,title,shortdesc from recipes where title like '%$search%'";

    $result = mysql_query($query) or die('Could not query database at this time');

    echo "<h1>Search Results</h1><br><br>\n";

    if (mysql_num_rows($result) == 0)
    {
        echo "<h2>Sorry, no recipes were found with '$search' in them.</h2>";
    } else
    {
        echo "<h2>Recipes matching '$search':</h2><br><br>";
        while($row=mysql_fetch_array($result, MYSQL_ASSOC))
        {
            $recipeid = $row['recipeid'];
            $title = $row['title'];
            $shortdesc = $row['shortdesc'];
            echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">$title</a><br>\n";
            echo "$shortdesc<br><br>\n";
        }
    }
?>
</div>
</div>