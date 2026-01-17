<?php
session_start();
?>
<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" media="print" type="text/css" href="print.css" />
<link rel="icon" type="image/ico" href="images/favicon.ico">
<link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
<title>ReciPHP v1</title>
</head>

<body>
<?php include("header.inc.php"); ?>
<div class="wrapper">

<?php include("nav.inc.php"); ?>

	<?php
               if (!isset($_REQUEST['content']))
                   include("main.inc.php");
               else
               {
                   $content = $_REQUEST['content'];
                   $nextpage = $content . ".inc.php";
                   include($nextpage);
               } 
	?>

<?php include("news.inc.php"); ?>
</div>
<?php include("footer.inc.php"); ?>
</body>
</html>