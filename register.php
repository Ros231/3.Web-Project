<?php 

    session_start();

    require_once "connect.php";
    if(isset($_POST["submit"])){

        $username = $_POST["username"];
        $password = $_POST["password"];
        $Firstname = $_POST["Firstname"];
        $Lastname = $_POST["Lastname"];

        $user_check = "SELECT * FROM user WHERE Name_user = '$username' LIMIT 1";
        $result = mysqli_query($connect,$user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['Name_user'] === $username ){
            echo "<script> alert('มีคนใช้ชื่อนี้เเล้วฮะ');</script>";
        } else {
            $passwordenc = md5($password);
            
            $query = "INSERT INTO user (Name_user, Password_user, First_name, Last_name, Level_user )
                        VALUE ('$username', '$passwordenc', '$Firstname', '$Lastname', 'a' )";

            $result = mysqli_query($connect,$query);
            
            if ($result) {
                $_SESSION['success_login'] = "Insert user เเล้ว";
                header("Location: myadmin.php");
            } else{
                $_SESSION['error_login'] = "ผมว่ามีอะไรผิดพลาด";
                header("Location: myadmin.php");
            }
    
        }           
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="header_1">
          <nav>
            <a href="index.php"><img class="logo" src="img/W2.png"></a>
          <ul class="Menu_bar_1">
            <li class="li_1"><a href="index.php">หน้าแรก</a></li>
            <li class="li_1"><a href="intern.php?option=0&option-position=0">หาที่ฝึกงาน</a></li>
            <li class="li_2"><a href="about-us.php">เกี่ยวกับเรา</a></li>
          </ul>
</div>

<div class="register-container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <label for="username">ใส่ชื่อผู้ใช้</label>
        <label for="username">Username</label>
        <input class="Username" type="text" name = "username" placeholder="ใส่ชื่อของผู้ใช้" required>
        <br>
        <label for="password">รหัสผู้ใช้</label>
        <label for="password">Password</label>
        <input class="Password" type="password" name = "password" placeholder="ใส่รหัสของผู้ใช้" required>
        <br>
        <label for="Firstname">ชื่อจริง</label>
        <label for="Firstname">Firstname</label>
        <input class="Fristname" type="text" name = "Firstname" placeholder="ใส่ชื่อจริงของผู้ใช้" required>
        <br>
        <label for="Lastname">นามสกุล </label>
        <label for="Lastname">Surname </label>
        <input class="Surname" type="text" name = "Lastname" placeholder="ใส่นามสกุลของผู้ใช้" required>
        <br>
        <input class="btn-submit" type="submit" name="submit"value="Submit">
    </form>
</div>

    <span class="d-flex justify-content-center"><a href="myadmin.php" class="btn btn-danger mt-5" style="font-size: 20pt;">กลับไปหน้า Login</a></span>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>