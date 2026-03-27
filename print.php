<?php
require "connect.php"; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/print.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    
</head>
<body>
    <?php
    $sql = "SELECT *
        FROM company_table
        JOIN faculty
        ON company_table.faculty_ID = faculty.faculty_ID
        JOIN tb_position 
        ON company_table.ref_position = tb_position.ID_position";

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
    $result = mysqli_query($connect, $sql);
    $order = 1;
    ?>
    <input type="button" onclick="printDiv('print-content')" class="btn btn-dark" value="Print!" />
            <a class="btn btn-dark"  href="intern.php?option=<?php echo $_GET["option"]; ?>&option-position=<?php echo $_GET["option-position"] ?>"> กลับ </a></div>
     <div class="table-body-print" id="print-content">
              <br>
              <br>
          <table class="table table-striped-columns">
        <thead>
          <th>ID</th>
          <th>ชื่อสถานประกอบ</th>
          <th>อำเภอ|เขต</th>
          <th>จังหวัด</th>
          <th>สาขา</th>
          <th>ระบบเรียน</th>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $order++;?></td>
              <td><?php echo $row["company_name"];  ?></td>
              <td><?php echo $row["Sub_district"]; ?></td>
              <td><?php echo $row["district"]    ; ?></td>
              <td><?php echo $row["Faculty_NAME"]; ?></td>
              <td><?php echo $row["name_position"]; ?></td>          
            </tr>
            <?php } ?> 
        </tbody>
      </table>
      </div>
      <script  src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
      <script  src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
      <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      
      <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
      </script>
    </body> 
</html>