<?php 

/**
 * 
 */
class add_to_cart
{
	
	function addProduct($pid,$quantity)
	{
		$_SESSION['cart'][$pid]['quantity'] = $quantity;
	}

	function updateProduct($pid,$quantity)
	{
		if (isset($_SESSION['cart'][$pid])) {
			$_SESSION['cart'][$pid]['quantity'] = $quantity;
		}
	}

	function removeProduct($pid)
	{
		if (isset($_SESSION['cart'][$pid])) {
			unset($_SESSION['cart'][$pid]);
		}
	}

	function emptyProduct($pid,$quantity)
	{
		unsrt($_SESSION['cart']);
	}



}

 ?>