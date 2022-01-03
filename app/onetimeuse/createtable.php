<?php
$conn = mysqli_connect('localhost','root','','UDB');
$sql = "CREATE TABLE data(
    Phone_id    INT NOT NULL,
    Phone_name VARCHAR (20) NOT NULL,
    Phone_color   VARCHAR (20) ,
    P_num    int,
    Release_date  VARCHAR (20), 
    PRIMARY KEY (Phone_id));";
    $squery = mysqli_query($conn,$sql) OR die("<br>لم يتم إنشاء الجدول");
mysqli_close($conn);

