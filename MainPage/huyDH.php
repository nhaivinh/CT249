<?php
    session_start();
    require_once("../DBconnect.php");

    if(isset($_POST['id_dh']) && isset($_POST['status_dh'])){
        $idDH = $_POST['id_dh'];
        $statusDH = $_POST['status_dh'];
        if($statusDH == "Chờ xử lý"){
            $connect = connectDB();

            $query = "Delete from chitietdh where id_dh=$idDH";
			mysqli_query($connect, $query);
            $query = "Delete from donhang where id_dh=$idDH";
			mysqli_query($connect, $query);

            closeDB($connect);
            $_SESSION['huyDH_Status'] = "Đã huỷ đơn hàng thành công";
            header("Location: ManagePage.php?info=hoaDon");
        }
        else{
            $_SESSION['huyDH_Status'] = "Đơn hàng đã xử lý không thể thực hiện huỷ";
            header("Location: ManagePage.php?info=hoaDon");
        }
    }
?>