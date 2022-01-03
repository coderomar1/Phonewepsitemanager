<?php
$conn = mysqli_connect('localhost','root','') OR die("لا يمكن الاتصال");
$sql = "create Database UDB";
$squery = mysqli_query($conn,$sql) OR die("<br>لا يمكن انشاء قاعدة بيانات");
mysqli_select_db($conn,'UDB');
$sql = "CREATE TABLE users(
    id   INT NOT NULL,
    name VARCHAR (20) NOT NULL,
    pass  VARCHAR (50) ,
    PRIMARY KEY (id));";
    $squery = mysqli_query($conn,$sql) OR die("<br>لم يتم إنشاء الجدول");
    $pass = sha1('123');
    $sql = "INSERT INTO users (id, name, pass)  
            VALUES ('10', 'admin', '" . $pass . "');";
    $q = mysqli_query($conn, $sql) OR            
        die("<br>لم يتم إدخال البيانات" . mysqli_error($conn));
mysqli_close($conn);
echo 'تم بنجاح';



