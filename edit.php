<?php require 'connect.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-------------------------------------------   --->
                    <div class="container mt-5">
                        <div class="modal-body">
                        <h1>EDIT</h1>
<!------------------------------------------------------------->
                            <form action="updata.php" method="POST">
                            <?php 
                                    $id = $_GET['company_ID'];
                                    $sql = "SELECT * FROM company_table JOIN faculty ON company_table.faculty_ID = faculty.faculty_ID JOIN tb_position AS p ON company_table.ref_position = p.ID_position  WHERE company_ID = $id";
                                    $result = mysqli_query($connect,$sql);
                                    $row = mysqli_fetch_assoc ($result); ?>   
                           
                                <input type="hidden"  name="company_ID"value="<?php echo $row['company_ID']; ?>">
                                </div>
                            <div class="mb-3">
                                <label for="company_name" class="col-form-label">ใส่ชื่อสถานประกอบการ:</label>
                                <input type="text" class="form-control" name="company_name"  value="<?php echo $row['company_name']; ?>">
                                </div>
                            <div class="mb-3">
                                <label for="company_address" class="col-form-label">ใส่ที่อยู่สถานประกอบการ:</label>
                                <input class="form-control" name="company_address"  value="<?php echo $row['company_address']; ?>">
                                </div>
                            <div class="mb-3">
                                <label for="faculty_option">สาขาของผู้เรียน</label>
                                    <select class="form-select" aria-label="Default select example" name = "faculty_option"  >
                                        <option value="1" <?php if ($row["Faculty_NAME"] == "การจัดการสำนักงาน") {
                                                             echo "SELECTED";
                                                            } ?>>การจัดการสำนักงาน</option>  
                                        <option value="2" <?php if ($row["Faculty_NAME"] == "การตลาด") {
                                                             echo "SELECTED";
                                                            } ?>>การตลาด</option>  
                                        <option value="3" <?php if ($row["Faculty_NAME"] == "การบัญชี") {
                                                             echo "SELECTED";
                                                            } ?>>การบัญชี</option>  
                                        <option value="4" <?php if ($row["Faculty_NAME"] == "การโรงแรม") {
                                                             echo "SELECTED";
                                                            } ?>>การโรงแรม</option>  
                                        <option value="5" <?php if ($row["Faculty_NAME"] == "การออกแบบ") {
                                                             echo "SELECTED";
                                                            } ?>>การออกแบบ</option>  
                                        <option value="6" <?php if ($row["Faculty_NAME"] == "คหกรรมศาสตร์") {
                                                             echo "SELECTED";
                                                            } ?>>คหกรรมศาสตร์</option>  
                                        <option value="7" <?php if ($row["Faculty_NAME"] == "คอมพิวเตอร์กราฟิก") {
                                                             echo "SELECTED";
                                                            } ?>>คอมพิวเตอร์กราฟิก</option>  
                                        <option value="8" <?php if ($row["Faculty_NAME"] == "คอมพิวเตอร์ธุรกิจ") {
                                                             echo "SELECTED";
                                                            } ?>>คอมพิวเตอร์ธุรกิจ</option>  
                                        <option value="9" <?php if ($row["Faculty_NAME"] == "เทคโนโลยีธุรกิจดิจิทัล") {
                                                             echo "SELECTED";
                                                            } ?>>เทคโนโลยีธุรกิจดิจิทัล</option>  
                                        <option value="10" <?php if ($row["Faculty_NAME"] == "เทคโนโลยีสารสนเทศ") {
                                                             echo "SELECTED";
                                                            } ?>>เทคโนโลยีสารสนเทศ</option>  
                                        <option value="11" <?php if ($row["Faculty_NAME"] == "แฟชั้นและสิ่งทอ") {
                                                             echo "SELECTED";
                                                            } ?>>แฟชั้นและสิ่งทอ</option>  
                                        <option value="12" <?php if ($row["Faculty_NAME"] == "โลจิสติกส์") {
                                                             echo "SELECTED";
                                                            } ?>>โลจิสติกส์</option>  
                                        <option value="13" <?php if ($row["Faculty_NAME"] == "อาหารและโภชนาการ") {
                                                             echo "SELECTED";
                                                            } ?>>อาหารและโภชนาการ</option>  
                                    </select>
                                        </div>

                                <div class="mb-3">
                                <label for="sub_district" class="col-form-label">ใส่อำเภอ:</label>
                                <textarea class="form-control" name="sub_district" ><?php echo $row['Sub_district']; ?></textarea>
                                    </div>

                                <div class="mb-3">
                                <label for="district" class="col-form-label">ใส่จังหวัด:</label>
                                <textarea class="form-control" name="district" ><?php echo $row['district']; ?></textarea>
                                    </div>

                                <div class="mb-3">
                                <label for="zipcode" class="col-form-label">ใส่รหัสไปรษณีย์:</label>
                                <textarea class="form-control" name="zipcode" ><?php echo $row['zipcode']; ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                    <label for="select">เลือกภาคเรียน</label><br/>
                                    <select class="form-select" aria-label="Default select example" name = "position" id="position"  >
                                        <option value="1" <?php  if ($row["name_position"] == "ภาคปกติ"){
                                            echo "SELECTED";
                                        }?>>ภาคปกติ</option>  
                                        <option value="2" <?php  if ($row["name_position"] == "ภาคทวิภาคี"){
                                            echo "SELECTED";
                                        }?>>ภาคทวิภาคี</option>  
                                    </select>
                                    </div>

                                <div class="modal-footer">
                                <a class="btn btn-secondary me-3" href="admin_page.php">close</a>
                                <button type="submit" name="submit" class="btn btn-success ">Submit data</button>
                            </div>
                            </form>
                        </div>
                        
                        </div>
                    </div>
                    </div>


        
        
        

                     
</body>
</html>