<?php
$Data =$_REQUEST["input"];
echo "The input from the request is <strong>" .$Data ."</strong.<br>";
if(empty($_REQUEST["input"])){
exit("please enter the input field data");
}

$input=htmlentities($_REQUEST["input"]);
echo ("The input from the request is <strong>" .$Data. "</strong>.<br>");
?>
