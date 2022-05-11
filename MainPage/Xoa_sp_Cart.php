<?php
	require_once("../DBprocess.php");
	if(isset($_POST)){
		$connect = connectDB();
		$id = $_POST['id_lk'];
		$id_user = $_SESSION['id_user'];
		
		$query = "delete from user_cart where id_user='".$id_user."' and id_lk='".$id."' ";
		mysqli_query($connect, $query);
		$_SESSION['xoa_sp_cart'] = "Xoá sản phẩm thành công";
		closeDB($connect);
		header("Location: Cart.php");
	}
?>