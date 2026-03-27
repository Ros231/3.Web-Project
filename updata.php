<?php 

    require ('connect.php'); 

    session_start();


    $id = $_POST["company_ID"];
    $name = $_POST["company_name"];
    $address = $_POST["company_address"];
    $faculty = $_POST["faculty_option"];
    $sub_district = $_POST["sub_district"];
    $district = $_POST["district"];
    $zipcode = $_POST["zipcode"];
    $position = $_POST["position"];

    $sql = "UPDATE company_table SET company_name='$name',company_address='$address', faculty_ID='$faculty', Sub_district='$sub_district', 
        district='$district' , zipcode='$zipcode', ref_position='$position' WHERE company_ID = $id; ";
    $result = mysqli_query($connect,$sql);

    if($result){
        $_SESSION['success'] = "เปลี่ยนข้อมูลสำเร็จ";
        print_r($id);
        header("Location: admin_page.php");
    }else{
        $_SESSION['error'] = "เปลี่ยนข้อมูลไม่สำเร็จ";
        print_r($id);
        header("Location: admin_page.php");
    }
?>