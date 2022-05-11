<?php
	require_once("../DBprocess.php");
	if(isset($_POST)){
		if($_POST['sl_sp'] > 0){
			$connect = connectDB();
			$id = $_POST['id_lk'];
			$id_user = $_SESSION['id_user'];
			$soluong = $_POST['sl_sp'];
			
			$query = "update user_cart set So_luong='".$soluong."' where id_user='".$id_user."' and id_lk='".$id."' ";
			mysqli_query($connect, $query);
			header("Location: Cart.php");
		}
		else{
			$_SESSION['edit_amount_status'] = "Số lượng nhập vào không hợp lệ";
			header("Location: Cart.php");
		}
	}
?>