<?php
    session_start();
    if(!(isset($_SESSION['user'])))
        header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> إضافة سجل</title>
</head>
<style>
    <?php 
        include 'css/style.css';
    ?>
</style>
<body>
<div class="formbody">       
   <form dir="rtl" method="POST">
       <div class="el">
            <input type="number" name="id" placeholder="اي دي الجوال" require><br>  
            <input type="text" name="name" placeholder=" اسم الجوال" require><br>  
            <input type="color" name="color" placeholder="لون الجوال" require><br> 
            <input type="number" name="num" placeholder=" الكمية" require><br>  
            <input type="date" name="date" placeholder="تاريخ الاصدار" require><br> 
            <input type="button" id="submit" onclick="window.location='data.php';"  value="الغاء">
            <input type="submit" name="sub" value="تسجيل" id="submit" ><br>
            <?php
        if(isset($_POST['sub'])){
            $id   = $_POST['id'];
            $name = $_POST['name'];
            $color = $_POST['color'];
            $num = $_POST['num'];
            $date = $_POST['date'];
            $conn = mysqli_connect('localhost','root','','UDB');
            $sql = "INSERT INTO data (Phone_id, Phone_name,Phone_color,P_num,Release_date)  
            values ('$id', '$name','$color','$num','$date');";
            if(empty($id&&$name&&$color&&$num&&$date)){
                echo '<h3 style="color:red;">اكمل البيانات</h3>';
            }
           else{ 
           $q= mysqli_query($conn, $sql) OR die("<h3 style='color:red;'>لا يمكن الإضافة</h3>");
             mysqli_close($conn);
                header("Location:data.php");
            }
        }
   ?>
       </div>
   </form>
</div>   
</body>
</html>