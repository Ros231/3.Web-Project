<?php 
require "connect.php"; 
require "Modal.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ข้อมูลสถานฝึกงาน</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/table.css">
  <link rel="stylesheet" href="css/intern.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  

<!----------------------------------PHP connect_table----------------------------------------->

<?php
 $sql2 = "SELECT *
 FROM company_table
 JOIN faculty
 ON company_table.faculty_ID = faculty.faculty_ID
 JOIN tb_position 
 ON company_table.ref_position = tb_position.ID_position " ; 

if (isset($_GET["option"]) || ($_GET["option-position"])) {
  $option = $_GET["option"];
  $option2 = $_GET["option-position"];
 if($option == 0 && $option2 == 0){                         
      $sql2 .= "" ; 
      }else if($option != 0 && $option2 == 0){
        $sql2 .= "WHERE company_table.faculty_ID = $option";
          } else if($option == 0 && $option2 != 0){
        $sql2 .= " WHERE company_table.ref_position = $option2";
          } else{
              $sql2 .= " WHERE company_table.faculty_ID = $option AND company_table.ref_position = $option2"  ;
}

  }
$result1 = mysqli_query($connect, $sql2);
$row = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$order = 1; 
 ?>
<!----------------------------------------------------------------------------------------------->
<!-----------------------------header---------------------------------->
    <header>
      <div class="header_1" id="header">
            <nav>
              <a href="index.php"><img class="logo" src="img/W2.png"></a>
            <ul class="Menu_bar_1">
              <li class="li_1"><a href="index.php">หน้าแรก</a></li>
              <li class="li_1"><a href="intern.php?option=0&option-position=0">หาที่ฝึกงาน</a></li>
              <li class="li_1"><a href="myadmin.php">ผู้ดูแล</a></li>
              <li class="li_2"><a href="about-us.php">เกี่ยวกับเรา</a></li>
            </ul>
      </div>
    </header>
    
<!-------------------------------table---------------------------------------------------------------->
<div class="main-content-table" id="print-content">
  <div class="table-body">
              <br>
              <br>
          <table id="myTable" class="table table-striped-columns">
          <div id="option">
          <div class="option_container_1"> 
            <p class="text-chosen">เลือกสาขาเเละระบบของผู้เรียน</p>
            </div> 
            <div class="count-search">ค้นพบทั้งหมด <?php echo count($row); ?> แห่ง</div>
            <div class="search_container">
              <?php 
              $sqloption = "SELECT * FROM faculty";
              $resultoption = mysqli_query($connect, $sqloption);
              $orderoption = 1;
              ?>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                  <select class="select_1" name ="option" id="intern-ful">
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
                <select name ="option-position" id="intern-pos">
                    <option value="0">ทั้งหมด</option>  
                    <option value="1">ระบบปกติ</option>  
                    <option value="2">ระบบทวิภาคี</option>
                </select>
                <br>
                <button class="btn btn-dark ms-2" type="submit">ค้นหา</button>
                </form>       
                </div>
                </div>
                <br/>
        <thead>
          <th>ID</th>
          <th>ชื่อสถานประกอบ</th>
          <th>อำเภอ|เขต</th>
          <th>จังหวัด</th>
          <th>สาขา</th>
          <th>ระบบเรียน</th>
          <th>ดูรายละเอียด</th>
        </thead>
        <tbody >
          <?php foreach ($row as $row):?>
            <tr>
              <td><?php echo $order++;?></td>
              <td><?php echo $row["company_name"];  ?></td>
              <td><?php echo $row["Sub_district"]; ?></td>
              <td><?php echo $row["district"]    ; ?></td>
              <td><?php echo $row["Faculty_NAME"]; ?></td>        
              <td><?php echo $row["name_position"]; ?></td>        
              <td><input type="button" name="view" value="ดูรายละเอียด" class="btn btn-dark data-button" id="<?php echo $row["company_ID"]; ?>"></input></td>       
            </tr>
            <?php endforeach; ?> 
        </tbody>
      </table>
      </div>
      
      <label class="btnprint">
        <a class="btn-print-text" href="print.php?option=<?php if (isset($_GET["option"])) { echo $_GET["option"];}?>&option-position=<?php if (isset($_GET["option-position"])) { echo $_GET["option-position"];}?>">PRINT!</a>
      </label>
      </div>
      <footer id="footer">
        <div>
        <nav>
            <div>
              <p>ผู้ใช้บริการ</p>
                <p style="font-size :14pt ">เบอร์โทร &nbsp; <i class="bi bi-telephone-fill"></i>&nbsp;: 0994022665</p>
            </div>
            <div>
              <a href="intern.php">ดูที่ฝึกงานทั้งหมด</a>
              <p style="font-size :14wpt">Gmail &nbsp; <i class="bi bi-envelope-at-fill"></i>&nbsp;: phanuwat.goon@gmail.com</p>
              </div>
            <div>
              <a href="about-us.php">เกี่ยวกับเรา</a>
              <p class=" text-muted ">© 2022 Phanuwat & team</p>
            </div>
          </nav> 
        </div> 
      </footer>
        <script src="JS/script.js"></script>
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
                }});
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
                    "search": "ค้นหาข้อมูล :",
                    "paginate": {
                          "next": "ถัดไป",
                          "previous": "ก่อนหน้า"
                          }
                }
                
            })
         
            document.getElementById('intern-ful').value = <?php echo $_GET["option"]; ?>
            //เดียวกลับมาลองใช้ wait sleep delay pause //
        </script>
</body>
</html>