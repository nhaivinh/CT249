<?php
    session_start();
    if(isset($_POST['del_CPU'])){
        unset($_SESSION['idChosenCPU']);
        unset($_SESSION['slCPU']);
        header("Location: BuildPc.php");
    }
    if(isset($_POST['del_Main'])){
        unset($_SESSION['idChosenMain']);
        unset($_SESSION['slMain']);
        header("Location: BuildPc.php");
    }
    if(isset($_POST['del_RAM'])){
        unset($_SESSION['idChosenRAM']);
        unset($_SESSION['slRAM']);
        header("Location: BuildPc.php");
    }
    if(isset($_POST['del_GPU'])){
        unset($_SESSION['idChosenGPU']);
        unset($_SESSION['slGPU']);
        header("Location: BuildPc.php");
    }
    if(isset($_POST['del_SSD'])){
        unset($_SESSION['idChosenSSD']);
        unset($_SESSION['slSSD']);
        header("Location: BuildPc.php");
    }
    if(isset($_POST['del_HDD'])){
        unset($_SESSION['idChosenHDD']);
        unset($_SESSION['slHDD']);
        header("Location: BuildPc.php");
    }
    if(isset($_POST['del_Case'])){
        unset($_SESSION['idChosenCase']);
        unset($_SESSION['slCase']);
        header("Location: BuildPc.php");
    }
?>