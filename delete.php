<?php
 require 'connect.php';

    session_start();


    $ID = $_GET["company_ID"];
    $sql = "DELETE FROM company_table WHERE company_ID = $ID";
    $result = mysqli_query($connect, $sql);

    if($result){

        $_SESSION['del-success'] = "ลบข้อมูลสำเร็จ";
        header("Location : admin_page.php");
        exit(0);
    }else{
        $_SESSION['del-error'] = "ลบข้อมูลไม่สำเร็จ";
        header("Location : admin_page.php");
        exit(0);
    }


?>