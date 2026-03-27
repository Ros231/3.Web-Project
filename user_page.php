<?php 

    session_start();

    if(!$_SESSION['userid']){
        header("Location: index.php");
    }else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_page</title>

    <link href="css/index.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
</head>
<body>
<div class="header_1">
          <nav>
            <a href="index.php"><img class="logo" src="img/W2.png"></a>
          <ul class="Menu_bar_1">
            <li class="li_1"><a href="index.php">หน้าแรก</a></li>
            <li class="li_1"><a href="intern.php">หาที่ฝึกงาน</a></li>
            <li class="li_2"><a href="about-us.php">เกี่ยวกับเรา</a></li>
          </ul>
    </div>
    <h1>คุณเป็นสมาชิกชมรมคนชอบหมี</h1>
        <p><a href="logout.php">logout</a></p>
</body>
</html>

<?php } ?>