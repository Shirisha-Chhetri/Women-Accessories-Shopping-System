<?php 
session_start();
if(isset($_SESSION['user1'])){
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_POST['Add_To_Cart']))
	{
		if(isset($_SESSION['cart']))
		{
			$myitem=array_column($_SESSION['cart'], 'Name');
			if(in_array($_POST['Name'], $myitem))
			{
				echo "<script>alert('Product Already added');
				window.location.href='home.php';</script>";
			}
			else{
			$count = count($_SESSION['cart']);
			$_SESSION['cart'][$count]=array('id' =>$_POST['id'],'Name' =>$_POST['Name'], 'Price'=>$_POST['Price'] , 'Quantity'=>1);
			echo "<script>alert('Product added');
				window.location.href='home.php';</script>";
			}
		}
		else{
			$_SESSION['cart'][0]=array('id' =>$_POST['id'],'Name' =>$_POST['Name'], 'Price'=>$_POST['Price'] ,'product_id'=>$_POST['id'], 'Quantity'=>1);
			echo "<script>alert('Product added');
				window.location.href='home.php';</script>";
		}	
	}

	if(isset($_POST['remove_item']))
	{
		foreach($_SESSION['cart'] as $key => $value) 
		{
			if($value['Name']==$_POST['Name'])
			{
			unset($_SESSION['cart'][$key]);
			$_SESSION['cart']=array_values($_SESSION['cart']);
			echo "<script>alert('Product Removed');
			window.location.href='mycart.php';</script>";
			}
		}
	}
	if(isset($_POST['mod_quantity']))
	{
		foreach($_SESSION['cart'] as $key => $value) 
		{
			if($value['Name']==$_POST['Name'])
			{
				$_SESSION['cart'][$key]['Quantity']=$_POST['mod_quantity'];
				echo "<script>window.location.href='mycart.php';</script>";
			}
		}
	}
	}
}
else{
	header("location:login.php");
}
 ?>