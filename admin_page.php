<?php 
require "connect.php"; 
require "Modal.php";
    

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_page</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/admin_page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!---------------------------------------------->    
    <div class="header_1">
          <nav>
            <a href="index.php"><img class="logo" src="img/W2.png"></a>
          <ul class="Menu_bar_1">
            <li class="li_1"><a href="index.php">หน้าแรก</a></li>
            <li class="li_1"><a href="intern.php?option=0&option-position=0">หาที่ฝึกงาน</a></li>
            <li class="li_1"><a href="register.php">เพิ่มผู้ดูเเล</a></li>
            <li class="li_2"><a href="about-us.php">เกี่ยวกับเรา</a></li>
          </ul>
    </div>
<!------------------header-End------------------------------->
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-6">
                                    <h1>เพื่มสถานประกอบการ</h1>
                            </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle ="modal" data-bs-target="#userModal">เพิ่มสถานประกอบการ</button>
                                </div>                           
                        </div>
                    
                        <hr>
                        <?php if (isset($_SESSION['success'])){ ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($_SESSION['error'])){ ?>
                            <div class="alert alert-danger ">
                                <?php 
                                    echo $_SESSION['error'];
                                    unset( $_SESSION['error']);
                                ?>
                            </div>
                        <?php }?>
                        <?php if (isset($_SESSION['del-success'])){ ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['del-success'];
                                    unset($_SESSION['del-success']);
                                ?>
                            </div>                  
                            <?php  } ?>
                            <?php if (isset($_SESSION['del-error'])){ ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['del-error'];
                                    unset($_SESSION['del-error']);
                                ?>
                            </div>                  
                            <?php  } ?>
                    </div>
                            <!---table---->
        <?php
         
         $sql = "SELECT *
         FROM company_table
         JOIN faculty
         ON company_table.faculty_ID = faculty.faculty_ID
         JOIN tb_position 
         ON company_table.ref_position = tb_position.ID_position " ; 
        
        if (isset($_GET["option"]) || ($_GET["option-position"])) {
          $option = $_GET["option"];
          $option2 = $_GET["option-position"];
         if($option == 0 && $option2 == 0){                         
              $sql .= "" ; 
              }else if($option != 0 && $option2 == 0){
                $sql .= "WHERE company_table.faculty_ID = $option";
                  } else if($option == 0 && $option2 != 0){
                $sql .= " WHERE company_table.ref_position = $option2";
                  } else{
                      $sql .= " WHERE company_table.faculty_ID = $option AND company_table.ref_position = $option2"  ;
        }
        
          }
$result1 = mysqli_query($connect, $sql);
$row_faculty = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$order = 1; 
?>
          
        <div class="table-body">
        <table id="myTable" class="table table-striped-columns">
        <p class="text-chosen">เลือกสาขาเเละระบบของผู้เรียน</p>
            </div> 
            <div class="count-search">ค้นพบทั้งหมด <?php echo count($row_faculty); ?> แห่ง</div>
            <div class="search_container">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <select class="select_1" name ="option">    
                    <option value="0">ทั้งหมด</option>  
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
                <select class="s1" name ="option-position" id="select-opt">
                    <option value="0">ทั้งหมด</option>  
                    <option value="1">ภาคปกติ</option>  
                    <option value="2">ภาคทวิภาคี</option>
                </select>
                <br>
                <button class="btn btn-dark ms-2" type="submit">ค้นหา</button>
                    </form>
        <thead>

          <th>ID</th>           <!---0--->
          <th>ชื่อสถานประกอบ</th> <!---1--->     
          <th>อำเภอ|เขต</th>     <!--3---->
          <th>จังหวัด</th>        <!--4---->  
          <th>สาขา</th>         <!----6-->   
          <th>ภาคเรียน</th>         <!----6-->   
          <th>แก้ไข</th>         <!---8--->
          <th>ลบ</th>
          <th>ดูรายละเอียด</th> 
        </thead>
        <tbody>
        <?php foreach ($row_faculty as $row_faculty) :?>
           <tr>
                <?php $row_faculty["company_ID"]; ?>
              <td><?php echo $order++;  ?></td>
              <td><?php echo $row_faculty["company_name"];  ?></td>
              <td><?php echo $row_faculty["Sub_district"]; ?></td>
              <td><?php echo $row_faculty["district"]    ; ?></td>
              <td><?php echo $row_faculty["Faculty_NAME"]; ?></td>
              <td><?php echo $row_faculty["name_position"]; ?></td>
              <td><a href="edit.php?company_ID=<?php echo $row_faculty['company_ID']?>"  class="btn btn-primary">Edit</a></td>
              <td><a href="delete.php?company_ID=<?php echo $row_faculty['company_ID']?>"  class="btn btn-danger">Delete</a></td>
              <td><input type="button" name="view" value="ดูรายละเอียด" class="btn btn-dark data-button" id="<?php echo $row_faculty["company_ID"]; ?>"></input></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
      </div>
        <script src="JS/sweetalert2@11.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" ></script>
        <script>
          $(document).ready( function(){
            $('.data-button').click(function(){
              var UID =$(this).attr("id");
                $.ajax({
                  url: "data.php",
                  method: "post",
                  data:{id:UID},
                  success:function(data){
                    $('#detail').html(data);
                    $('#datamodal').modal('show');
                  }
                });
              });
            $('#myTable').DataTable({
                "responsive": true,
                "order":[0, "asc"],
                "pageLength": 12,
                "bInfo": false,
                "bLengthChange": false,
                "language":{
                    "zeroRecords": "ไม่มีข้อมูลนี้เลยข้อมูล TwT",

                }
            })
          }); 
        </script>
</div>
</div>
<!------------------------------------------------------------->
                     <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="insert.php" method="POST">
                            <div class="mt-3">
                                <label for="company_name" class="col-form-label p-0 mb-2">ใส่ชื่อสถานประกอบการ:</label><br/>
                                <input type="text" class="form-control" placeholder="ชื่อสถานประกอบการ" name="company_name" id="company_name" required>
                            </div>
                            <div class="mt-3">
                                <label for="company_address" class="col-form-label p-0 mb-2">ใส่ที่อยู่สถานประกอบการ:</label><br/>
                                <textarea class="form-control" placeholder="เช่น บ้านเลขที่, ถนน, หมู่, ตำบล " name="company_address" id="company_address" required></textarea>
                                </div>

                            <div class="container-sel mt-3">
                                <label for="select" class="col-form-label p-0 mb-2">เลือกสาขา</label><br/>
                                <select class="form-select" aria-label="Default select example" name = "faculty_option"  >
                                    <option class="op_text_1" id="op_1" value="">เลือกสาขาทั้งหมด</option>
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

                                <div class="mt-3">
                                <label for="sub_district" class="col-form-label p-0 mb-2">ใส่อำเภอ:</label><br/>
                                <textarea class="form-control" name="sub_district" placeholder="อำเภอ" required id="sub_district"></textarea>
                                    </div>

                                <div class="mt-3">
                                <label for="district" class="col-form-label p-0 mb-2">ใส่จังหวัด:</label>
                                <textarea class="form-control" name="district" placeholder="จังหวัด" required id="district"></textarea>
                                    </div>

                                <div class="mt-3">
                                <label for="zipcode" class="col-form-label p-0 mb-2">ใส่รหัสไปรษณีย์:</label>
                                <textarea class="form-control" name="zipcode" placeholder="รหัสไปรษณีย์" id="zipcode"></textarea>
                                    </div>

                                    <div class="container-sel mt-3">
                                    <label for="select" class="col-form-label p-0 mb-2">เลือกภาคเรียน</label><br/>
                                    <select class="form-select" aria-label="Default select example" name = "position" id="position"  >
                                        <option value="1">ภาคปกติ</option>  
                                        <option value="2">ภาคทวิภาคี</option>  
                                    </select>
                                    </div>

                                <div class="modal-footer">
                                <a type="" class="btn btn-primary mt-2" href="insert2.php" style="padding-top:11px ;">เพิ่มสถานประกอบการหลายแห่ง</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                <button type="submit" name="submit" class="btn btn-success">Submit data</button>
                            </div>
                            </form>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                    <div class="container mt-5">
                        <div class="row">      
                            <div class="col-md-6 d-flex justify-content-end" style="position:sticky;">   
                                <a class="btn btn-danger mx-6" href="logout.php">Logout</a>
                                
                            </div>                           
                        </div>
                    </div>                   
</body>
</html>
