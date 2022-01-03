<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل </title>
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
            <input type="number" name="id" placeholder="الرقم الاكاديمي"><br>  
            <input type="text" name="user" placeholder=" اسم المستخدم"><br>  
            <input type="password" name="pass" placeholder="كلمة المرور"><br> 
            <input type="submit" name="sub" value="تسجيل" id="submit" ><br>
            <a href="index.php">اضغط هنا لتسجيل الدخول</a> 
            <?php
        if(isset($_POST['sub'])){
            $id = $_POST['id'];
            $user = $_POST['user'];
            $pass = sha1($_POST['pass']);
            $conn = mysqli_connect('localhost','root','','UDB');
            $sql = "INSERT INTO users (id, name, pass)  
            values ('$id', '$user','$pass');";
            if(empty($id&&$user)){
                echo '<h3 style="color:red;">اكمل البيانات</h3>';
            }
            if($pass==sha1("")){
                echo '<h3 style="color:red;">اكمل البيانات</h3>';
            }
            else{
                $q= mysqli_query($conn, $sql) OR die('<br><h3 style="color:red;"> اسم المستخدم مسجل مسبقاً</h3>');
                mysqli_close($conn);
                   header("Location:main.php");
            }
      
        }
   ?>
       </div>
    </div>   
   </form>
</body>
</html>