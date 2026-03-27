<?php  

    session_start();

    if(isset($_POST['username'])) {

        include('connect.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $query = "SELECT * FROM user WHERE Name_user = '$username' AND Password_user = '$passwordenc'";
        
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1){
            
            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['IDuser'];
            $_SESSION['user'] = $row['First_name']. " " . $row['Last_name'];
            $_SESSION['userlevel'] = $row['Level_user'];

            if ($_SESSION['userlevel'] == 'a'){
                header("Location: admin_page.php?option-position=0");

            }
            if ($_SESSION['userlevel'] == 'm'){
                header("Location: user_page.php");
           
            }
        }else {
            if($result){
            $_SESSION['login-success'] = "<script> alert (' user or password ไม่ถูกต้อง') </script>";
            header("Location:myadmin.php");
        }
        }
    }else {
        header("Location:myadmin.php"); 
    }

?>