<?php 
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');


$pid = get_safe_value($con,$_POST['pid']);
$quantity = get_safe_value($con,$_POST['quantity']);
$type = get_safe_value($con,$_POST['type']);


$obj = new add_to_cart();
 if ($type == 'add') {
 	$obj->addProduct($pid,$quantity);
 }
echo $obj->totalProduct();
 ?>