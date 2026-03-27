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
                        $sql = "INSERT INTO company_table(company_name, company_address, faculty_ID, Sub_district, district, zipcode, ref_position) 
                            VALUES ('$company_name', '$company_address', $faculty,'$sub_district', '$district', '$zipcode', $position )";
                        $result = mysqli_query($connect, $sql);
                       
                    if($result){
                        $_SESSION['success1'] = "เพิ่มข้อมูลสำเร็จ";
                            
                       }else {
                        $_SESSION['error1'] = "เพิ่มข้อมูลไม่สำเร็จ";
                       }
                       

                    }
                       ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/insert2.css">
    <link rel="stylesheet" href="css/admin_page.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <h1>เพิ่มสถานประกอบการ</h1>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <div class=""><br/>
                                <label for="company_name">ใส่ชื่อสถานประกอบการ</label><br/>
                                <input type="text" class="form-control" placeholder="ชื่อสถานประกอบการ" name="company_name" id="company_name" required>
                            </div>
                            <div><br/>
                                <label for="company_address">ใส่ที่อยู่สถานประกอบการ</label><br/>
                                <textarea class="form-control" placeholder="เช่น บ้านเลขที่, ถนน, หมู่, ตำบล " name="company_address" id="company_address" required></textarea>
                                </div>

                            <div class="container-sel"><br/>
                                <label for="select">เลือกสาขา</label><br/>
                                <select class="form-select" aria-label="Default select example" name = "faculty_option" id="faculty" >
                                    <option value="1">การจัดการสำนักงาน</option>  
                                    <option value="2">การตลาด</option>  
                                    <option value="3">การบัญชี</option>  
                                    <option value="4">การโรงแรม</option>  
                                    <option value="5">การออกแบบ</option>  
                                    <option value="6">คหกรรมศาสตร์</option>  
                                    <option value="7">คอมพิวเตอร์กราฟิก</option>  
                                    <option value="8">คอมพิวเตอร์ธุรกิจ</option>  
                                    <option value="9">เทคโนโลยีธุรกิจดิจิทัล</option>  
                                    <option value="10">เทคโนโลยีสารสนเทศ</option>  
                                    <option value="11">แฟชั้นและสิ่งทอ</option>  
                                    <option value="12">โลจิสติกส์</option>  
                                    <option value="13">อาหารและโภชนาการ</option>  
                                </select>
                            </div>

                                <div class=""><br/>
                                <label for="sub_district">ใส่อำเภอ/เขต:</label><br/>
                                <textarea class="form-control" name="sub_district" placeholder="อำเภอ" required id="sub_district"></textarea>
                                    </div>

                                <div class=""><br/>
                                <label for="district">ใส่จังหวัด:</label><br/>
                                <textarea class="form-control" name="district" placeholder="จังหวัด" required id="district"></textarea>
                                    </div>

                                <div class=""><br/>
                                <label for="zipcode">ใส่รหัสไปรษณีย์:</label><br/>
                                <textarea class="form-control" name="zipcode" placeholder="รหัสไปรษณีย์"  id="zipcode"></textarea>
                                    </div>
                                
                                <div><br/>
                                    <label for="select">เลือกภาคเรียน</label><br/>
                                    <select class="form-select" aria-label="Default select example" name = "position" id="position"  >
                                        <option value="1">ภาคปกติ</option>  
                                        <option value="2">ภาคทวิภาคี</option>  
                                    </select>
                                    </div>

                                <br/>
                                <div class="">
                                <a href="admin_page.php?option-position=0" class="btn btn-danger">BACK to ADMINPAGE</a>
                                <button type="submit" name="submit" class="btn btn-success">Submit data</button>
                                <p id="darktheme"></p>
                            </div>
                            </form>
                        </div>
                        </div>
                        <br/>
                        <?php if (isset($_SESSION['success1'])){ ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success1'];
                                    unset($_SESSION['success1']);
                                ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($_SESSION['error1'])){ ?>
                            <div class="alert alert-danger ">
                                <?php 
                                    echo $_SESSION['error1'];
                                    unset( $_SESSION['error1']);
                                    print_r($company_name);
                                    print_r($company_address);
                                    print_r($faculty);
                                    print_r($sub_district);
                                    print_r($district);
                                    print_r($zipcode);
                                    mysqli_error($connect);
                                ?>
                            </div>
                        <?php }?>   
                        <script type="text/javascript">
                            document.getElementById('faculty').value = "<?php echo $_POST['faculty_option'];  ?>";
                            document.getElementById('position').value = "<?php echo $_POST['position'];  ?>";
                        </script>
    
</body>
</html>                       