<?php
	session_start();
	require_once("DBConnect.php");
	function register(){
		if(isset($_POST)){
			$connect = connectDB();
			$hoten = $_POST['hoten'];
			$username = $_POST['reg_username'];
			$password = $_POST['reg_password'];
			$repass = $_POST['re-pass'];
			$email = $_POST['email'];
			$diachi = $_POST['address'];
			$sdt = $_POST['phone_number'];
			$query = "Select * from Account where username = '".$username."'";
			$result = mysqli_query($connect, $query);
			$data= array();
			while ($row = mysqli_fetch_array($result,1)){
				$data[] = $row;
			}
			if(count($data) == 0){
				if($password == $repass){
					$query = "Select max(ID_User) as MAX from account";
					$result = mysqli_query($connect, $query);
					$max_id= array();
					while ($row = mysqli_fetch_array($result,1)){
						$max_id[] = $row;
					}
					$id = $max_id[0]['MAX'] + 1;
					$query = "Insert into Account(ID_User,username, password) values ('".$id."','".$username."','".$password."')";
					mysqli_query(connectDB(), $query);
					$query = "Insert into info_user(ID_User, Hoten_user, SoDT_User, Email_User) values 
						('".$id."','".$hoten."','".$sdt."','".$email."')";
					mysqli_query(connectDB(), $query);
					$query = "Insert into address_user(ID_User, Diachi) values 
						('".$id."','".$diachi."')";
					mysqli_query(connectDB(), $query);

					$_SESSION['register_status'] = "Đăng ký thành công";
					closeDB($connect);
					header("Location: index.php");
				}
				else{ 
					$_SESSION['register_status'] = "Password và Repass không giống nhau";
					closeDB($connect);
					header("Location: Register_form.php");
				}
			}
			else{ 
				$_SESSION['register_status'] = "Username đã tồn tại";
				closeDB($connect);
				header("Location: Register_form.php");
			}
		}
	}
	function login(){
		if(isset($_POST)){
			$connect = connectDB();
			$username = $_POST['username'];
			$password = $_POST['password'];
			$query = "Select * from Account where username = '".$username."'";
			$result = mysqli_query($connect, $query);
			$data = array();
			while ($row = mysqli_fetch_array($result,1)){
				$data[] = $row;
			}
			if($data != null && count($data) >0){
				$query = "Select * from Account where username = '".$username."' and password = '".$password."'";
				$result = mysqli_query($connect, $query);
				$data2 = array();
				while ($row = mysqli_fetch_array($result,1)){
					$data2[] = $row;
				}
				if($data2 != null && count($data2) >0){
					$_SESSION['id_user'] = $data2[0]['ID_User'];
					$_SESSION['username'] = $username;
					$_SESSION['privilege'] = $data2[0]['Quyen_han'];
					$_SESSION['login_status'] = "Đăng nhập thành công";
					closeDB($connect);
				}
				else {
					$_SESSION['login_status'] = "Mật khẩu không đúng";
					closeDB($connect);
				}
			} 
			else {
				$_SESSION['login_status'] = "Username không tồn tại";
				closeDB($connect);
			}
		}
	}
	function logout(){
		unset($_SESSION['username']);
		unset($_SESSION['privilege']);
		$_SESSION['logout_success'] = "Đã đăng xuất khỏi tài khoản";
		header("Location: index.php");	
	}
?>