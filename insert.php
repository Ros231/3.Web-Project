<?php
        session_start();
        require_once "connect.php";




                if(isset($_POST["submit"])){
                        $company_name = $_POST['company_name'];
                        $company_address = $_POST['company_address'];
                        $faculty = $_POST['faculty_option'];
                        $sub_district = $_POST['sub_district'];
                        $district = $_POST['district'];
                        $zipcode = $_POST['zipcode'];
                        $position = $_POST['position'];
                        $sql = $connect -> prepare("INSERT INTO company_table(company_name, company_address, faculty_ID, Sub_district, district, zipcode, ref_position) 
                            VALUES ('$company_name', '$company_address', $faculty,'$sub_district', '$district', '$zipcode', '$position' )");
                        
                    if($sql){
                        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
                        header("Location: admin_page.php?option-position=0");
                            
                       }else {
                        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
                        print_r($company_name);
                        print_r($company_address);
                        print_r($faculty);
                        print_r($sub_district);
                        print_r($district);
                        print_r($zipcode);
                        print_r($position);
                        mysqli_error($connect);
                        //header("Location: admin_page.php");
                       }
                       $sql->execute();
                    }
                       ?>
