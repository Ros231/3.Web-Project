<?php
    //connect to sql//
    $hostname = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "project";
    $port = "3306";

    mysqli_report(MYSQLI_REPORT_OFF);
    $connect = mysqli_connect($hostname,$username,$password,$database,$port);
    if (!$connect){
        die("not connect". mysqli_connect_error());
    }
    