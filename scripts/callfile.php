<!DOCTYPE html>
<?php
header('Content-Type:text/html;charset=ISO-8859-1');   // ISO-8859-1
?>

<html>
<head>
<?php require './standardHEAD.php' ?>


<?php
$file_selected = $_GET['file'];
?>

</head  >
<body>

 
  
	<?php
	$myfile = fopen("../data/".$file_selected, "r") or die("Unable to open file!");
	$output = fread($myfile,filesize("../data/".$file_selected));
	echo $output;
	fclose($myfile);
    ?>
    
 
</body>
</html>