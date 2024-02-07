<?php
$inputData =$_REQUEST["input"];
echo "The input from the request is <strong>" . $inputData . "</strong>.<br>";
if(empty($_REQUEST["input"])){
  exit("please enter the input field 'input'");
  
}
$data=htmlentities($_REQUEST["input"]);
echo ("The input from the request is <strong>" .$data. "</strong>.<br>");
?>
