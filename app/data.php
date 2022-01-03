<?php
    session_start();
    if(!(isset($_SESSION['user'])))
        header("Location:index.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>البيانات</title>
    </head>
        <style>
            <?php include 'css/style.css' ?>
        </style>
    <body>
     <div class="link">   
    <a id="link1" href="logout.php">تسجيل خروج</a>
    <a id="link2" href="main.php">جدول المستخدمين</a>
    <a id="link3" href="datasign.php">اضافة سجل</a> 
    </div>
    <div class="tablediv">
        <?php        
            $conn = mysqli_connect('localhost','root','','UDB');
            $result = mysqli_query($conn,"SELECT * FROM data;");
            mysqli_close($conn);
            echo "<table >";
            echo "<th>Phone ID</th><th>Phone Name</th><th>Phone color</th><th>num</th><th>Release date</th><th>تعديل</th><th>حذف</th>";
            if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>" . $row['Phone_id'] . "</td>";
                    echo "<td>" . $row['Phone_name'] . "</td>";
                    echo "<td>" . $row['Phone_color'] . "</td>";
                    echo "<td>" . $row['P_num'] . "</td>";
                    echo "<td>" . $row['Release_date'] . "</td>";
                    echo '<td><a href="update/updatedata.php?id='. $row['Phone_id'] .'">تعديل</a></td>';
                    echo "<td><a href='delete/deletedata.php?id=". $row['Phone_id'] ."'>حذف</a></td></tr>";
                }
            }
            echo "</table>"; 
        ?> 
    </div>     
    </body>
</html>