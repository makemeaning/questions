
<?php
header('Content-Type: text/html; charset=ISO-8859-1');   //  ISO-8859-1
?>
<html>
<head>
<meta http-equiv="Content-Type"  content="text/html; charset=ISO-8859-1"  >
</head>
<body>


<?php

	$elsea = "what is this?";
	$more = <<<VHB
		what else is this?
VHB;



?>





<p>
	�	193<p>

	�	201<p>

	�	211<p>

	�	218<p>

	�	220<p>
	
	BEGIN VIEW PHP PRODUCED TEXT <p>

	<?php
	
	$code = "	�	193<p>	�	201<p>	�	211<p>	�	218<p>	�	220<p>";
    echo $code;
	
	echo "NOW VIEW PHP GENERATED CODE<br>";

	$A = chr(193)."<br>";
	$E = chr(201)."<br>";
	echo $A.$E."<br>";
	
	echo "NOW VIEW PHP READ FROM A FILE<br>";	
	
	$myfile = fopen("./cards/characters.txt", "r") or die("Unable to open file!");
	$output = fread($myfile,filesize("./cards/characters.txt"));
	echo $output;
	fclose($myfile);
	echo "<br><br>";
	$contents = file_get_contents("./cards/characters.txt");
	echo $contents;
	
    ?>
	
</body>


