<?php 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Page</title>

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
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
   <div class = "login-container" style=" margin-top: 50px;"> 
    <form action="login.php" method="post">
      <h1>LOGIN</h1> 
        <div class="mt-3">
          <label for="username">ใส่ชื่อผู้ใช้</label>
          <label for="username">Username</label>
          <input class="username" type="text" name = "username"  placeholder="ใส่ชื่อผู้ใช้" required>
        </div>
        <br>
        <div>
          <label for="password">รหัสผู้ใช้</label> 
          <label for="password">Password</label>
          <input class="password" type="password" name = "password" placeholder="ใส่รหัสผ่าน" required>
        </div>
        <br>
        <div style="display: flex; justify-content: center;">
          <input class="btn btn-dark" style="font-size : 18pt; padding: 5px 50px ;" type="submit" name="submit"value="Login">
        </div>
    </form>
    </div>
    <?php 
    
    session_start();
    if(isset($_SESSION['login-success'])){
  echo $_SESSION['login-success'];
  unset ( $_SESSION['login-success']);

} 
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>