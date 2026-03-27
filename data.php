<?php 
require 'connect.php';



$id = $_POST['id'];
$sql = "SELECT *FROM company_table JOIN faculty ON company_table.faculty_ID = faculty.faculty_ID JOIN tb_position ON company_table.ref_position = tb_position.ID_position 
WHERE company_ID = $id";
$result = mysqli_query($connect, $sql);

    
  

$output = '<div><table class="table table-striped-columns">'; 
while ($row = mysqli_fetch_assoc($result)){

  
$output .= '
    <tr>
       <td><label>ที่อยู่ : </label></td> 
        <td>'.$row ["company_address"].'</td>
    </tr>';
$output .= '
    <tr>
        <td><label>รหัสไปรษณีย์ : </label></td> 
        <td>'.$row ["zipcode"].'</td>
    </tr>';
//$output .= '
    //<tr>
        //<td><label>ภาคเรียน : </label></td> 
        //<td>'.$row ["name_position"].'</td>
    //</tr>';

}
$output .= '</table></div>';

echo $output;
?>
