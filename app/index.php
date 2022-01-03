<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
</head>
<style>
    <?php include 'css/style.css';?>
</style>
<body>
<div class="formbody">       
   <form dir="rtl" method="POST">
       <div class="el">
            <input type="text" name="user" placeholder="اسم المستخدم" value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} ?>" require><br>  
            <input type="password" name="pass" placeholder="كلمة المرور" value="<?php  if(isset($_COOKIE['pass']) ){echo $_COOKIE['pass'];} ?>" require><br>
            <div dir="ltr" ><b>تذكرني</b>
            <input  type="checkbox" name="rm" id="rm"><br> 
            </div>
            <input type="submit" name="sub" value="تسجيل الدخول" id="submit" ><br>
            <a href="sign.php">اضغط هنا لتسجيل</a>
            <?php      
        if(isset($_POST['sub'])){
            $user = $_POST['user'];
            $pass = sha1($_POST['pass']);
            $conn = mysqli_connect('localhost','root','','UDB');
            $sql = "SELECT * FROM users WHERE name='$user' AND pass='$pass';";
            $rs = mysqli_query($conn, $sql);
            mysqli_close($conn);
            $rowcount = mysqli_num_rows($rs);
            if($rowcount> 0){ 
                session_start();
                $_SESSION['user'] = $user;
                if(isset($_POST['rm'])){
                    $pass = $_POST['pass'];
                    setcookie('user',$user,strtotime("+1 week"));
                    setcookie('pass',$pass,strtotime("+1 week"));
                }
                header("Location:main.php");
            }
            else{
                echo '<h3 style="color:red;">اسم المستخدم أو كلمة المرور خاطئة</h3>';
            }
        }
   ?> 
       </div>
    </div>   
   </form>
</body>
</html>