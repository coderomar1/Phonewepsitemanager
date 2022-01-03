<?php
    session_start();
    if(!(isset($_SESSION['user'])))
        header("Location:index.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>المستخدمين</title>
    </head>
        <style>
            <?php include 'css/style.css' ?>
        </style>
    <body>
     <div class="link">   
    <a id="link1" href="logout.php">تسجيل خروج</a> 
    <a id="link2" href="data.php">جدول البيانات</a> 
    </div>    
    <div class="tablediv">
        <?php        
            $conn = mysqli_connect('localhost','root','','UDB');
            $result = mysqli_query($conn,"SELECT * FROM users;");
            mysqli_close($conn);
            echo "<table >";
            echo "<th>ID</th><th>User Name</th><th>Password</th><th>تعديل</th><th>حذف</th>";
            if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['pass'] . "</td>";
                    echo '<td><a href="update/updateuser.php?id='. $row['id'] .'">تعديل</a></td>';
                    echo "<td><a href='delete/deleteuser.php?id=". $row['id'] ."'>حذف</a></td></tr>";
                }
            }
            echo "</table>"; 
        ?> 
    </div>     
    </body>
</html>