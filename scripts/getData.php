<?php
function getData($file_name) {
$myfile = fopen("./data/".$file_name, "r") or die("Unable to open file!");
$output = fread($myfile,filesize("./data/".$file_name));
fclose($myfile);
return $output;
}

function getInstructions($file_name){
$instructions = "inst_".$file_name;
$myfile = fopen("./data/".$instructions, "r") or die("Unable to open file!");
$output = fread($myfile,filesize("./data/".$instructions));
fclose($myfile);
return $output;
}

?>